<?php

class Passanger extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Passanger_model','this_model');
    }

    function index() {
        
        $data['page'] = "admin/passanger/list";
        $data['passanger'] = 'active open';
        $data['passanger'] = 'active';
        $data['var_meta_title'] = 'Passanger';
        $data['var_meta_description'] = 'Passanger';
        $data['var_meta_keyword'] = 'Passanger';
        $data['js'] = array(
           'admin/passanger.js'
        );
        $data['init'] = array(
            'Passanger.init()',
        );
        $data['passangerData'] = $this->this_model->getPassangerData();
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function add() {
        $data['page'] = "admin/passanger/add";
        $data['passanger'] = 'active open';
        $data['passanger'] = 'active';
        $data['var_meta_title'] = 'Passanger add';
        $data['var_meta_description'] = 'Passanger add';
        $data['var_meta_keyword'] = 'Passanger add';
        $data['js'] = array(
            'admin/passanger.js'
        );
        $data['init'] = array(
              'Passanger.add_init()',
        );
        
        if($this->input->post()){
            $validation = $this->setRules();
            if($validation){
                $result = $this->this_model->addPassanger($this->input->post());
                $this->utility->setFlashMessage ($result['status'], $result['message']);
                redirect(admin_url() . 'passanger');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function edit($id) {
        $id = $this->utility->decode($id);
         if(!ctype_digit($id)){
             $this->utility->setFlashMessage ( 'danger', DEFAULT_MESSAGE );
             redirect (admin_url().'passanger');
         }
        $data['page'] = "admin/passanger/edit";
        $data['formAction'] = $this->utility->encode($id);
        $data['passanger'] = 'active open';
        $data['passanger'] = 'active';
        $data['var_meta_title'] = 'Passanger edit';
        $data['var_meta_description'] = 'Passanger edit';
        $data['var_meta_keyword'] = 'Passanger edit';
        $data['js'] = array(
            'admin/passanger.js'
        );
        $data['init'] = array(
            'Passanger.edit_init()',
        );
        
        $data['getPassangerData'] = $this->this_model->getPassangerData($id);
        
        if($this->input->post()){
            $validation = $this->setRulesEdit($this->input->post('passanger_name'),$this->input->post('orignal_name'));
            if($validation){
                $result = $this->this_model->editPassanger($this->input->post());
                $this->utility->setFlashMessage ($result['status'],$result['message']);
                redirect (admin_url().'passanger');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function deletePassanger($id){
        $id = $this->utility->decode($id);
        if (!ctype_digit($id)) {
            $this->utility->setFlashMessage('danger', DEFAULT_MESSAGE);
            redirect(admin_url() . 'passanger');
        }
        $result = $this->this_model->deletePassanger($id);
        $this->utility->setFlashMessage ($result['status'],$result['message']);
        redirect (admin_url().'passanger');   
    }
    
      /**
    * setRules()
    * This method check server side validation
    */
    function setRules(){
        
       $config = array(
            array('field' => 'passanger_name', 
                  'label' => 'passanger_name', 
                  'rules' => 'trim|required|is_unique[master_passanger.name]',
                   "errors" => [
                        'required' => "please enter passanger name",
                        'is_unique' => 'This passanger info is already exist'
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
            $is_unique =  '|is_unique[master_passanger.name]';
        }else{
            $is_unique =  '';
        }
       $config = array(
            array('field' => 'passanger_name', 
                  'label' => 'passanger_name', 
                  'rules' => 'trim|required'.$is_unique,
                   "errors" => [
                        'required' => "please enter passanger name",
                        'is_unique' => 'This passanger info is already exist'
                    ] 
                )
        );

        $this->form_validation->set_rules($config);
        return ($this->form_validation->run());
    }
    
}

?>