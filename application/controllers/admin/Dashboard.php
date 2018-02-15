<?php

class Dashboard extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['page'] = "admin/account/dashboard";
        $data['breadcrumb'] = 'Dashboard';
        $data['breadcrumb_sub'] = 'Dashboard';
        $data['breadcrumb_list'] = array(
            array('Dashboard', '')
        );
        $data['dashboard'] = 'active open';
        $data['dashboard'] = 'active';
        $data['var_meta_title'] = 'Dashboard';
        $data['var_meta_description'] = 'Dashboard';
        $data['var_meta_keyword'] = 'Dashboard';
        $data['js'] = array(
//            'admin/dashboard.js',
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(

        );
        $data['js_plugin'] = array(

        );
        $data['init'] = array(
//            'Dashboard.init()',
        );

        $this->load->view(ADMIN_LAYOUT, $data);
    }
    

}

?>