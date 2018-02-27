<?php

class Setting extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Client_model','this_model');
    }

    function index() {
        $data['page'] = "admin/setting/department/index";
        $data['setting'] = 'active';
        $data['department'] = 'active';
        $data['pagetitle'] = 'Department';
        $data['var_meta_title'] = 'Department';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'client'=>'Department List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );
        
        $data['js'] = array(
             'plugins/dataTables/datatables.min.js',
             'admin/setting.js',
        );
        $data['init'] = array(
            'Setting.clientList()',
        );
        $data['getComany'] = $this->this_model->getcompanyDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function department_add() {
        $data['page'] = "admin/setting/department/add";
        $data['setting'] = 'active';
        $data['department'] = 'active';
        $data['pagetitle'] = 'Department Add';
        $data['var_meta_title'] = 'Department Add';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'department'=>'Department Add',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'admin/setting.js',
        );
        $data['init'] = array(
            'Setting.deparmtmentAdd()',
        );
        
        $data['country'] = $this->this_model->countryList();
        if($this->input->post()){
            $res = $this->this_model->addCompany($this->input->post());
            echo json_encode($res); exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function department_edit($id) {
        $data['page'] = "admin/setting/department/add";
        $data['setting'] = 'active';
        $data['department'] = 'active';
        $data['pagetitle'] = 'Department Edit';
        $data['var_meta_title'] = 'Department Edit';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'department'=>'Department Edit',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'admin/setting.js',
        );
        $data['init'] = array(
            'Setting.deparmtmentAdd()',
        );
        
        $data['country'] = $this->this_model->countryList();
        if($this->input->post()){
            $res = $this->this_model->addCompany($this->input->post());
            echo json_encode($res); exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    
    function getPersonInfo(){
        if($this->input->post()){
           $result =  $this->db->get_where(TABLE_USER,array('id' => $this->input->post('personId'),'company_id' => $this->input->post('companyId')))->result_array();
           echo json_encode($result); exit();
        }
    }
    
   function reporter_list() {
        $data['page'] = "admin/setting/reporter/index";
        $data['setting'] = 'active';
        $data['reporter'] = 'active';
        $data['pagetitle'] = 'Reporter';
        $data['var_meta_title'] = 'Reporter';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'reporter'=>'Reporter List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );
        
        $data['js'] = array(
             'plugins/dataTables/datatables.min.js',
             'admin/setting.js',
        );
        $data['init'] = array(
            'Setting.clientList()',
        );
        $data['getComany'] = $this->this_model->getcompanyDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function reporter_add() {
        $data['page'] = "admin/setting/reporter/add";
        $data['reporter'] = 'active';
        $data['reporter'] = 'active';
        $data['pagetitle'] = 'Reporter Add';
        $data['var_meta_title'] = 'Reporter Add';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'reporter'=>'Reporter Add',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'admin/setting.js',
        );
        $data['init'] = array(
            'Setting.deparmtmentAdd()',
        );
        
        $data['country'] = $this->this_model->countryList();
        if($this->input->post()){
            $res = $this->this_model->addCompany($this->input->post());
            echo json_encode($res); exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function reporter_edit($id) {
        $data['page'] = "admin/setting/reporter/add";
        $data['setting'] = 'active';
        $data['reporter'] = 'active';
        $data['pagetitle'] = 'Reporter Edit';
        $data['var_meta_title'] = 'Reporter Edit';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'reporter'=>'Reporter Edit',
        );
        $data['css'] = array();
        
        $data['js'] = array(
            'admin/setting.js',
        );
        $data['init'] = array(
            'Setting.deparmtmentAdd()',
        );
        
        $data['country'] = $this->this_model->countryList();
        if($this->input->post()){
            $res = $this->this_model->addCompany($this->input->post());
            echo json_encode($res); exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }


}

?>