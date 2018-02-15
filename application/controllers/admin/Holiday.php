<?php

class Holiday extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Holiday_model','this_model');
    }

    function index() {
        
        $data['page'] = "admin/holiday/list";
        $data['holiday'] = 'active open';
        $data['holiday'] = 'active';
        $data['var_meta_title'] = 'Holiday';
        $data['var_meta_description'] = 'Holiday';
        $data['var_meta_keyword'] = 'Holiday';
        $data['js'] = array(
           'admin/holiday.js'
        );
        $data['init'] = array(
            'Holiday.init()',
        );
        $data['holidayData'] = $this->this_model->getHolidayData();
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function add() {
        $data['page'] = "admin/holiday/add";
        $data['holiday'] = 'active open';
        $data['holiday'] = 'active';
        $data['var_meta_title'] = 'Holiday add';
        $data['var_meta_description'] = 'Holiday add';
        $data['var_meta_keyword'] = 'Holiday add';
        $data['js'] = array(
            'admin/holiday.js'
        );
        $data['init'] = array(
              'Holiday.add_init()',
        );
        
        if($this->input->post()){
            $validation = $this->setRules();
            if($validation){
                $result = $this->this_model->addHoliday($this->input->post());
                $this->utility->setFlashMessage($result['status'], $result['message']);
                redirect(admin_url() . 'holiday');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function edit($id) {
        
        $id = $this->utility->decode($id);
         if(!ctype_digit($id)){
             $this->utility->setFlashMessage ( 'danger', DEFAULT_MESSAGE );
             redirect (admin_url().'holiday');
         }
         
        $data['page'] = "admin/holiday/edit";
        $data['formAction'] = $this->utility->encode($id);
        $data['holiday'] = 'active open';
        $data['holiday'] = 'active';
        $data['var_meta_title'] = 'Holiday edit';
        $data['var_meta_description'] = 'Holiday edit';
        $data['var_meta_keyword'] = 'Holiday edit';
        $data['js'] = array(
            'admin/holiday.js'
        );
        $data['init'] = array(
            'Holiday.edit_init()',
        );
        
        $data['getHolidayData'] = $this->this_model->getHolidayData($id);
        
        if($this->input->post()){
            $validation = $this->setRulesEdit($this->input->post('holiday_name'),$this->input->post('orignal_name'));
            if($validation){
                $result = $this->this_model->editHoliday($this->input->post());
                $this->utility->setFlashMessage($result['status'], $result['message']);
                redirect(admin_url() . 'holiday');
            }
        }
        
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    
    function deleteHoliday($id){
        $id = $this->utility->decode($id);
         if(!ctype_digit($id)){
             $this->utility->setFlashMessage ( 'danger', DEFAULT_MESSAGE );
             redirect (admin_url().'holiday');
         }
        $result = $this->this_model->deleteHoliday($id);
        $this->utility->setFlashMessage ($result['status'],$result['message']);
        redirect (admin_url().'holiday');
    }
    
     /**
    * setRules()
    * This method check server side validation
    */
    function setRules(){
        
       $config = array(
            array('field' => 'holiday_name', 
                  'label' => 'holiday_name', 
                  'rules' => 'trim|required|is_unique[master_holiday.name]',
                   "errors" => [
                        'required' => "please enter holiday name",
                        'is_unique' => 'This holiday info is already exist'
                    ] 
                )
        );

        $this->form_validation->set_rules($config);
        return ($this->form_validation->run());
    }
    
    /**
    * setRulesEdit()
    * This method check server side validation for edit holidays
    */
    function setRulesEdit($postData,$originalValue){
        if($postData != $originalValue){
            $is_unique =  '|is_unique[master_holiday.name]';
        }else{
            $is_unique =  '';
        }
       $config = array(
            array('field' => 'holiday_name', 
                  'label' => 'holiday_name', 
                  'rules' => 'trim|required'.$is_unique,
                   "errors" => [
                        'required' => "please enter holiday name",
                        'is_unique' => 'This holiday info is already exist'
                    ] 
                )
        );

        $this->form_validation->set_rules($config);
        return ($this->form_validation->run());
    }
    
}

?>