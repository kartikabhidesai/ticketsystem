<?php

class Tickets extends Client_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Department_model','Department_model');
        $this->load->model('Tickets_model','this_model');
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
        $data['getTicket'] = $this->this_model->getTicketDetail();
        $this->load->view(CLIENT_LAYOUT, $data);
    }
  
    function add() {
        $data['page'] = "client/tickets/add";
        $data['ticket'] = 'active';
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
        
        $data['department_detail'] = $this->Department_model->getDepartmentDetail();
        if($this->input->post()){
            $res = $this->this_model->addTicket($this->input->post());
            echo json_encode($res); exit();
        }
        $this->load->view(CLIENT_LAYOUT, $data);
    }

    function view($id) {
        $ticketId = $this->utility->decode($id);
        
         if(!ctype_digit($ticketId)){
             redirect(client_url().'tickets');
         }
         
        $data['page'] = "client/tickets/view";
        $data['ticket'] = 'active';
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
        $data['getTicket'] = $this->this_model->getTicketDetail($ticketId,TRUE);
        if(empty($data['getTicket'])){
            redirect(client_url().'tickets');
        }
        $data['department_detail'] = $this->Department_model->getDepartmentDetail();
        if($this->input->post()){
            $res = $this->this_model->updateCoversation($this->input->post(),$ticketId);
            echo json_encode($res); exit();
        }
        $this->load->view(CLIENT_LAYOUT, $data);
    }

    function edit($id) {
        $ticketId = $this->utility->decode($id);
        
         if(!ctype_digit($ticketId)){
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
        
        $data['department_detail'] = $this->Department_model->getDepartmentDetail();
        $data['getTicket'] = $this->this_model->getTicketDetail($ticketId);
        if($this->input->post()){
            $res = $this->this_model->editTicket($this->input->post(),$ticketId);
            echo json_encode($res); exit();
        }
        $this->load->view(CLIENT_LAYOUT, $data);
    }
    
    function deleteTicket(){
        if($this->input->post()){
            $result = $this->this_model->deleteTicket($this->input->post());
            echo json_encode($result); exit();
        }
    }
    
}

?>