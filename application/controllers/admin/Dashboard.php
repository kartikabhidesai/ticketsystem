<?php

class Dashboard extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Department_model', 'Department_model');
        $this->load->model('Tickets_model', 'this_model');
        $this->load->model('Client_model', 'Client_model');
    }

    function index() {
        $data['page'] = "admin/account/index";
//        $data['page'] = "admin/account/dashboard";
        $data['dashboard'] = 'active';
        $data['pagetitle'] = 'Dashboard';
        $data['var_meta_title'] = 'Dashboard';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'dashboard1' => 'Dashboard',
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
        $companyId = '';
        $data['getTicket'] = $this->this_model->getClientTicketList($clientId, $companyId);

        $this->load->view(ADMIN_LAYOUT, $data);
    }

}

?>