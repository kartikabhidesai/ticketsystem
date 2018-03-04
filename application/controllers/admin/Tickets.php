<?php

class Tickets extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Department_model','Department_model');
        $this->load->model('Tickets_model','this_model');
        $this->load->model('Client_model','Client_model');
    }

    function index() {
        $data['page'] = "admin/tickets/index";
        $data['ticket'] = 'active';
        $data['pagetitle'] = 'Tickets';
        $data['var_meta_title'] = 'Tickets';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );
        
        $data['js'] = array(
             'plugins/dataTables/datatables.min.js',
             'admin/ticket.js',
        );
        $data['init'] = array(
            'Tickets.clientList()',
        );
        $clientId = '';
        $data['getTicket'] = $this->this_model->getClientTicketList($clientId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }
  
    function add() {
        $data['page'] = "admin/tickets/add";
        $data['ticket'] = 'active';
        $data['pagetitle'] = 'Tickets';
        $data['var_meta_title'] = 'Tickets';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets Add',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'admin/ticket.js'
        );
        $data['init'] = array(
            'Tickets.ticketAdd()',
        );
        $clientId = '';
        $data['department_detail'] = $this->Department_model->getDepartmentDetail($clientId);
        $data['reporter_detail'] = $this->Client_model->getReporterDetail($clientId);
        // print_r($data['reporter_detail'] );exit;
        if($this->input->post()){
            // print_r($this->input->post());exit;
             $res = $this->this_model->addTicket($this->input->post());
            
                if($res)
                {
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Ticket add successfully.';
                    $json_response['redirect'] = admin_url() . 'tickets';
                }else{
                     $json_response['status'] = 'error';
                     $json_response['message'] = 'Something went wrong.';
                }
                echo json_encode($json_response); exit();
            }
            $this->load->view(ADMIN_LAYOUT, $data);
        }

    function view($id) {
         $ticketId = $this->utility->decode($id);
        
         if(!ctype_digit($ticketId)){
             redirect(admin_url().'tickets');
         }
        $data['page'] = "admin/tickets/view";
        $data['ticket'] = 'active';
        $data['pagetitle'] = 'Tickets';
        $data['var_meta_title'] = 'Tickets';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets Add',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'admin/ticket.js',
        );
        $data['init'] = array(
            'Tickets.clientViews()',
        );
        
        $data['getTicket'] = $this->this_model->getTicketDetail($ticketId);
        // echo '<pre/>'; print_r($data['getTicket'] );exit;
        if(empty($data['getTicket'])){
            redirect(admin_url().'tickets');
        }
        $data['decodeId'] = $id;
        $data['department_detail'] = $this->Department_model->getDepartmentDetail();
        if($this->input->post()){
            $res = $this->this_model->updateCoversation($this->input->post(),$ticketId);
            echo json_encode($res); exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
        $ticketId = $this->utility->decode($id);
        
         if(!ctype_digit($ticketId)){
             redirect(client_url().'tickets');
         }
        
        
        $data['page'] = "admin/tickets/edit";
        $data['ticket'] = 'active';
        $data['pagetitle'] = 'Tickets';
        $data['var_meta_title'] = 'Tickets';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets Edit',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'admin/ticket.js',
        );
        $data['init'] = array(
            'Tickets.ticketEdit()',
        );
        $clientId = '';
        $data['decodeId'] = $id;
        $data['department_detail'] = $this->Department_model->getDepartmentDetail();
        $data['getTicket'] = $this->this_model->getTicketDetail($ticketId);
        $data['reporter_detail'] = $this->Client_model->getReporterDetail($clientId);
        // print_r( $data['reporter_detail'] );exit;
        if($this->input->post()){
            // print_r($this->input->post());exit;
            $res = $this->this_model->editTicket($this->input->post(),$ticketId);
            if($res)
            {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Ticket edit successfully';
                $json_response['redirect'] = admin_url() . 'tickets/';
            }else{
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
            }
            echo json_encode($json_response); exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function detail($id) {
        $companyId = $this->utility->decode($id);
        if(!ctype_digit($companyId)){
            return(admin_url().'client');
        }
        $data['page'] = "admin/client/detail";
        $data['ticket'] = 'active';
        $data['pagetitle'] = 'Tickets Detail';
        $data['var_meta_title'] = 'Tickets Detail';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets Detail',
        );
        $data['css'] = array('plugins/dataTables/datatables.min.css');
        
        $data['js'] = array(
           'plugins/dataTables/datatables.min.js',
           'admin/ticket.js',
        );
        $data['init'] = array(
            'Tickets.clientDetail()',
        );
        $data['companyId'] = $companyId;
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($companyId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function deleteTicket(){
        if($this->input->post()){
            $result = $this->this_model->deleteTicket($this->input->post());
            echo json_encode($result); exit();
        }
    }

    
    function sendEmail(){
        $this->load->library('email');
        
        $config['protocol'] = "smtp";
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        
        $config['smtp_timeout'] = 20;
        $config['priority'] = 1;
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['mailtype'] = "html";
        $config['starttls']  = true;
                
        
        
        $this->email->initialize($config);
        //$this->email->clear(TRUE);
        $this->email->to('kartikdesai123@gmail.com');
        $this->email->from($config ['smtp_user'], PROJECT_NAME);
        
        $this->email->subject('Test Email');
        $this->email->message('Hello this is test mgs');
       
        $response = $this->email->send();
        echo $this->email->print_debugger();exit;
    }

}

?>