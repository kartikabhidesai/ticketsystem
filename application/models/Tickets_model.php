<?php

class Tickets_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    function addTicket($postData) {
        $data['insert']['name'] = $postData['company_name'];
        $data['insert']['email'] = $postData['company_email'];
        $data['insert']['phone'] = $postData['company_phone'];
        $data['insert']['address'] = $postData['additional_information'];
        $data['insert']['city'] = $postData['company_city'];
        $data['insert']['country_id'] = $postData['country_name'];
        $data['insert']['dt_created'] = DATE_TIME;
        $data['insert']['dt_updated'] = DATE_TIME;
        $data['table'] = TABLE_COMPANY;
        $companyId = $this->insertRecord($data);

        unset($data);
        if ($companyId) {
            $result = $this->addCompanyUsers($postData, $companyId);
            if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Ticket add successfully';
                $json_response['redirect'] = admin_url() . 'client';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
            }
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }
    
    function getTicketDetail($ticketId = NULL,$converSation = NULL){
        $coversationData = [];
        if($converSation){
           $coversationData = $this->getCoversation($ticketId);
        }
        
    }
    
    function getCoversation($ticketId){
        
    }
            
    function editTicket($postData,$ticketId){
        
    }
    
    function deleteTicket($data){
        $this->db->where('ticket_id',$data['id']);
        $this->db->delete(TABLE_TICKET_CONVERSATION);
        
        $this->db->where('id',$data['id']);
        $result =  $this->db->delete(TABLE_TICKET);
        if($result){
            $json_response['status'] = 'success';
            $json_response['message'] = 'Person delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
            
        }else{
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }
    
    function updateCoversation($postData,$ticketId){
        
    }
    

}

?>