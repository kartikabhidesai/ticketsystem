<?php

class Client extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['page'] = "admin/client/index";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client';
        $data['var_meta_title'] = 'Client';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Client List',
        );
        $data['css'] = array('plugins/dataTables/datatables.min.css');
        
        $data['js'] = array(
             'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientList()',
        );

        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function add() {
        $data['page'] = "admin/client/add";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client';
        $data['var_meta_title'] = 'Client';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Client Add',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientAdd()',
        );

        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function edit($id) {
        $data['page'] = "admin/client/edit";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client';
        $data['var_meta_title'] = 'Client';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Client Edit',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientEdit()',
        );

        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function detail($id) {
        $data['page'] = "admin/client/detail";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client Detail';
        $data['var_meta_title'] = 'Client Detail';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Client Detail',
        );
        $data['css'] = array('plugins/dataTables/datatables.min.css');
        
        $data['js'] = array(
           'plugins/dataTables/datatables.min.js',
           'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientDetail()',
        );

        $this->load->view(ADMIN_LAYOUT, $data);
    }
    

}

?>