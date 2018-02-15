<?php

class Includes extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Include_model','this_model');
    }

    function index() {
        
        $data['page'] = "admin/include/list";
        $data['includes'] = 'active open';
        $data['includes'] = 'active';
        $data['var_meta_title'] = 'Include';
        $data['var_meta_description'] = 'Include';
        $data['var_meta_keyword'] = 'Include';
        $data['js'] = array(
           'admin/include.js'
        );
        $data['init'] = array(
            'Include.init()',
        );
        $data['includesData'] = $this->this_model->getIncludeData();
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function add() {
        $data['page'] = "admin/include/add";
        $data['includes'] = 'active open';
        $data['includes'] = 'active';
        $data['var_meta_title'] = 'Include add';
        $data['var_meta_description'] = 'Include add';
        $data['var_meta_keyword'] = 'Include add';
        $data['js'] = array(
            'admin/include.js'
        );
        $data['init'] = array(
              'Include.add_init()',
        );
        
        if($this->input->post()){
            $validation = $this->setRules();
            if ($validation) {
              $result = $this->this_model->addInclude($this->input->post());
              $this->utility->setFlashMessage ($result['status'],$result['message']);
              redirect (admin_url().'includes');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function edit($id) {
        $id = $this->utility->decode($id);
         if(!ctype_digit($id)){
             $this->utility->setFlashMessage ( 'danger', DEFAULT_MESSAGE );
             redirect (admin_url().'includes');
         }
        
        $data['page'] = "admin/include/edit";
        $data['formAction'] = $this->utility->encode($id);
        $data['includes'] = 'active open';
        $data['includes'] = 'active';
        $data['var_meta_title'] = 'Include edit';
        $data['var_meta_description'] = 'Include edit';
        $data['var_meta_keyword'] = 'Include edit';
        $data['js'] = array(
            'admin/include.js'
        );
        $data['init'] = array(
            'Include.edit_init()',
        );
        
        $data['getIncludeData'] = $this->this_model->getIncludeData($id);
        
        if($this->input->post()){
            $validation = $this->setRulesEdit($this->input->post('inlcude_name'), $this->input->post('orignal_name'));
            if ($validation) {
                $result = $this->this_model->editInclude($this->input->post());
                $this->utility->setFlashMessage ($result['status'],$result['message']);
                redirect (admin_url().'includes');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function deleteInclude($id) {
        $id = $this->utility->decode($id);
        if (!ctype_digit($id)) {
            $this->utility->setFlashMessage('danger', DEFAULT_MESSAGE);
            redirect(admin_url() . 'includes');
        }
        $result = $this->this_model->deleteInclude($id);
        $this->utility->setFlashMessage ($result['status'],$result['message']);
        redirect (admin_url().'includes');
    }
    
     /**
    * setRules()
    * This method check server side validation
    */
    function setRules(){
        
       $config = array(
            array('field' => 'include_name', 
                  'label' => 'include_name', 
                  'rules' => 'trim|required|is_unique[master_includes.name]',
                   "errors" => [
                        'required' => "please enter inlcude name",
                        'is_unique' => 'This inlcude is already exist'
                    ] 
                )
        );

        $this->form_validation->set_rules($config);
        return ($this->form_validation->run());
    }
    
    /**
    * setRulesEdit()
    * This method check server side validation for edit theme
    */
    function setRulesEdit($postData,$originalValue){
        if($postData != $originalValue){
            $is_unique =  '|is_unique[master_includes.name]';
        }else{
            $is_unique =  '';
        }
       $config = array(
            array('field' => 'inlcude_name', 
                  'label' => 'inlcude_name', 
                  'rules' => 'trim|required'.$is_unique,
                   "errors" => [
                        'required' => "please enter inlcude name",
                        'is_unique' => 'This inlcude is already exist'
                    ] 
                )
        );

        $this->form_validation->set_rules($config);
        return ($this->form_validation->run());
    }

}

?>