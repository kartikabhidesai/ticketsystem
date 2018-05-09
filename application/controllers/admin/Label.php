<?php

class Label extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Client_model','this_model');
    }

    function index() {
        $data['page'] = "admin/label/detail";
        $data['label'] = 'active';
        $data['pagetitle'] = 'Label';
        $data['var_meta_title'] = 'Label';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Label List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );
        
        $data['js'] = array(
             'plugins/dataTables/datatables.min.js',
             'admin/label.js',
        );
        $data['init'] = array(
            'Label.labelList()',
        );
        $data['getComany'] = $this->this_model->getcompanyDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }
}

?>