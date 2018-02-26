<?php

class Tickets extends Client_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Client_model','this_model');
    }

    function index() {
        $data['page'] = "client/tickets/index";
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
             'client/ticket.js',
        );
        $data['init'] = array(
            'Tickets.clientList()',
        );
        $data['getComany'] = $this->this_model->getcompanyDetail();
        $this->load->view(CLIENT_LAYOUT, $data);
    }
  
    function add() {
        $data['page'] = "client/tickets/add";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Tickets';
        $data['var_meta_title'] = 'Tickets';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets Add',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'client/ticket.js',
        );
        $data['init'] = array(
            'Tickets.ticketAdd()',
        );
        
        $data['country'] = $this->this_model->countryList();
        if($this->input->post()){
            $res = $this->this_model->addCompany($this->input->post());
            echo json_encode($res); exit();
        }
        $this->load->view(CLIENT_LAYOUT, $data);
    }

    function view() {
        $data['page'] = "client/tickets/view";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Tickets';
        $data['var_meta_title'] = 'Tickets';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets Add',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'client/ticket.js',
        );
        $data['init'] = array(
            'Tickets.ticketAdd()',
        );
        
        $data['country'] = $this->this_model->countryList();
        if($this->input->post()){
            $res = $this->this_model->addCompany($this->input->post());
            echo json_encode($res); exit();
        }
        $this->load->view(CLIENT_LAYOUT, $data);
    }

    function edit($id) {
        $companyId = $this->utility->decode($id);
        
        if(!ctype_digit($companyId)){
            redirect(client_url().'tickets');
        }
        
        $data['page'] = "client/tickets/edit";
        $data['ticket'] = 'active';
        $data['pagetitle'] = 'Tickets';
        $data['var_meta_title'] = 'Tickets';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Tickets Edit',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'client/ticket.js',
        );
        $data['init'] = array(
            'Tickets.ticketEdit()',
        );
        
        $data['country'] = $this->this_model->countryList();
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        
        if($this->input->post()){
            $res = $this->this_model->editCompany($this->input->post(),$companyId);
            echo json_encode($res); exit();
        }
        $this->load->view(CLIENT_LAYOUT, $data);
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
           'client/ticket.js',
        );
        $data['init'] = array(
            'Tickets.clientDetail()',
        );
        $data['companyId'] = $companyId;
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($companyId);
        $this->load->view(CLIENT_LAYOUT, $data);
    }
    
    function addUpdatePerson(){
        
        if($this->input->post()){
            if($this->input->post('person_id')){
                $res = $this->this_model->editCompanyUsers($this->input->post());
            }else{
                $res = $this->this_model->addCompanyUsers($this->input->post(),$this->input->post('company_id'));
            }
           
            if($res){
                if(is_array($res)){
                    echo json_encode($res); exit();    
                }else{
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Person add successfully';
                    $json_response['redirect'] = admin_url().'client/detail/'.$this->utility->encode($this->input->post('company_id'));
                    echo json_encode($json_response); exit(); 
                }
            }else{
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
                echo json_encode($json_response); exit(); 
            }
            
        }
    }
    
    function getPersonInfo(){
        if($this->input->post()){
           $result =  $this->db->get_where(TABLE_USER,array('id' => $this->input->post('personId'),'company_id' => $this->input->post('companyId')))->result_array();
           echo json_encode($result); exit();
        }
    }
    
    function deletePerson(){
        if($this->input->post()){
            $result = $this->this_model->deletePerson($this->input->post());
            echo json_encode($result); exit();
        }
    }
    
    function clientDelete(){
        if($this->input->post()){
            $result = $this->this_model->deleteClient($this->input->post());
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