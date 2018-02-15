<?php

class Theme extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Theme_model','this_model');
    }

    function index() {
        $data['page'] = "admin/theme/list";
        $data['theme'] = 'active open';
        $data['theme'] = 'active';
        $data['var_meta_title'] = 'Theme';
        $data['var_meta_description'] = 'Theme';
        $data['var_meta_keyword'] = 'Theme';
        $data['js'] = array(
           'admin/theme.js'
        );
        $data['init'] = array(
            'Theme.init()',
        );
        $data['themeData'] = $this->this_model->getThemeData();
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function add() {
        $data['page'] = "admin/theme/add";
        $data['theme'] = 'active open';
        $data['theme'] = 'active';
        $data['var_meta_title'] = 'Theme add';
        $data['var_meta_description'] = 'Theme add';
        $data['var_meta_keyword'] = 'Theme add';
        $data['js'] = array(
            'admin/theme.js'
        );
        $data['init'] = array(
              'Theme.add_init()',
        );
        
        if($this->input->post()){
            $validation = $this->setRules();
            if($validation){
                $result = $this->this_model->addTheme($this->input->post());
                $this->utility->setFlashMessage ($result['status'],$result['message']);
                redirect (admin_url().'theme');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    /**
     * 
     * @param type $id
     */
    function edit($id) {
         $id = $this->utility->decode($id);
         if(!ctype_digit($id)){
             $this->utility->setFlashMessage ( 'danger', DEFAULT_MESSAGE );
             redirect (admin_url().'theme');
         }
         
        $data['page'] = "admin/theme/edit";
        $data['formAction'] = $this->utility->encode($id);
        $data['theme'] = 'active open';
        $data['theme'] = 'active';
        $data['var_meta_title'] = 'Theme edit';
        $data['var_meta_description'] = 'Theme edit';
        $data['var_meta_keyword'] = 'Theme edit';
        $data['js'] = array(
            'admin/theme.js'
        );
        $data['init'] = array(
            'Theme.edit_init()',
        );
        
        $data['getThemeData'] = $this->this_model->getThemeData($id);
        if($this->input->post()){
            
            $validation = $this->setRulesEdit($this->input->post('theme_name'),$this->input->post('orignal_name'));
            if($validation){
                $result = $this->this_model->editTheme($this->input->post());
                $this->utility->setFlashMessage ($result['status'],$result['message']);
                redirect (admin_url().'theme');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function deleteTheme($id){
        $id = $this->utility->decode($id);
        if (!ctype_digit($id)) {
            $this->utility->setFlashMessage('danger', DEFAULT_MESSAGE);
            redirect(admin_url() . 'theme');
        }
        
        $result = $this->this_model->deleteTheme($id);
        $this->utility->setFlashMessage ($result['status'],$result['message']);
        redirect (admin_url().'theme');
    }
    


    /**
    * setRules()
    * This method check server side validation
    */
    function setRules(){
        
       $config = array(
            array('field' => 'theme_name', 
                  'label' => 'theme_name', 
                  'rules' => 'trim|required|is_unique[master_theme.name]',
                   "errors" => [
                        'required' => "please enter theme name",
                        'is_unique' => 'This theme is already exist'
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
            $is_unique =  '|is_unique[master_theme.name]';
        }else{
            $is_unique =  '';
        }
       $config = array(
            array('field' => 'theme_name', 
                  'label' => 'theme_name', 
                  'rules' => 'trim|required'.$is_unique,
                   "errors" => [
                        'required' => "please enter theme name",
                        'is_unique' => 'This theme is already exist'
                    ] 
                )
        );

        $this->form_validation->set_rules($config);
        return ($this->form_validation->run());
    }
    
}

?>