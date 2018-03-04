<?php

class Tickets_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    function addTicket($postData) {

     
        $ticket_attachment = '';
        if(!empty($_FILES['ticket_attachment'])){
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1000';
            $config['max_width']  = '3000';
            $config['max_height']  = '3000';
            
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('ticket_attachment'))
            {
                 $json_response['status'] = 'error';
                 $json_response['message'] = $this->upload->display_errors();
            }
            else
            {
                  $ticket_attachmentArr = $this->upload->data();
                
                  $ticket_attachment = $ticket_attachmentArr['file_name'];
            }
        }
      
        $data['insert']['client_id'] = $postData['client_id'];
        $data['insert']['department_id'] = $postData['department_id'];
        $data['insert']['ticket_code'] = $postData['ticket_code'];
        $data['insert']['subject'] = $postData['subject'];
        $data['insert']['ticket_message'] = $postData['ticket_message'];
        $data['insert']['status'] = $postData['status'];
        $data['insert']['priority'] = $postData['priority'];
        $data['insert']['image'] = $ticket_attachment;
        $data['insert']['dt_created'] = DATE_TIME;
        $data['insert']['dt_updated'] = DATE_TIME;
        $data['table'] = TABLE_TICKET;
        $result = $this->insertRecord($data);

        unset($data);
        if ($result) {
            $this->sendTicketMail($postData,$result);
            return true;
        } else {
           return false;
        }
       
    }

    public function sendTicketMail($postData,$result){
             // print_r($postData);exit;
            $postData['link'] = admin_url().'tickets/view/'.  $this->utility->encode($result);
            // $data['message'] = $this->load->view('email_template/ticket_mail',$n,true);
            $data ['message'] = $postData['ticket_message'] . '<br>' . $postData['link'];
            $data ['from_title'] = 'Create Ticketd';
            $data ['subject'] = $postData['subject'];
            $data ['to'] = 'shaileshvanaliya91@gmail.com';
            // $data ["to"] = $postData['person_email'];
            $mailSend = $this->utility->sendMailSMTP($data);
            return true;
    }

    function getClientTicketList($client_id) {
        
        $data['select'] = ['t.id', 't.ticket_code', 't.subject', 't.status','t.priority','mdt.name','usr.first_name','usr.last_name'];
        if($client_id != ""){
            $data['where'] = ['client_id' => $client_id];
        }
        $data['join'] = [
            TABLE_MASTER_DEPARTMENT . ' as mdt' => [
                'mdt.id = t.department_id',
                'LEFT',
            ],
            TABLE_USER . ' as usr' => [
                'usr.id = t.client_id',
                'LEFT',
            ],
        ];
        $data['table'] = TABLE_TICKET.' as t';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function getTicketDetail($ticketId) {
        $data['select'] = ['t.*','mdt.name as departmentName','usr.first_name','usr.last_name'];
        $data['where'] = ['t.id' => $ticketId];
        $data['join'] = [
            TABLE_MASTER_DEPARTMENT . ' as mdt' => [
                'mdt.id = t.department_id',
                'LEFT',
            ],
            TABLE_USER . ' as usr' => [
                'usr.id = t.client_id',
                'LEFT',
            ],
        ];        
        $data['table'] = TABLE_TICKET . ' as t';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function editTicket($postData, $ticketId) {
        
        if(!empty($_FILES['ticket_attachment'])){
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1000';
            $config['max_width']  = '3000';
            $config['max_height']  = '3000';
            
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('ticket_attachment'))
            {
                 $json_response['status'] = 'error';
                 $json_response['message'] = $this->upload->display_errors();
            }
            else
            {
                  $ticket_attachmentArr = $this->upload->data();
                
                  $ticket_attachment = $ticket_attachmentArr['file_name'];
            }
        }
      
        $data['update']['department_id'] = $postData['department_id'];
        $data['update']['subject'] = $postData['subject'];
        $data['update']['ticket_message'] = $postData['ticket_message'];
        $data['update']['priority'] = $postData['priority'];
        if(!empty($_FILES['ticket_attachment'])){
            $data['update']['image'] = $ticket_attachment;
        }
        $data['update']['dt_updated'] = DATE_TIME;
        $data['where'] = ['id' => $postData['id']];
        $data['table'] = TABLE_TICKET;
        $result = $this->updateRecords($data);

        unset($data);

        if($result){
            return true;
        }else{
            return false;
        }
        
    }

    function deleteTicket($data) {
        $this->db->where('ticket_id', $data['id']);
        $this->db->delete(TABLE_TICKET_CONVERSATION);

        $this->db->where('id', $data['id']);
        $result = $this->db->delete(TABLE_TICKET);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Ticket delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function updateCoversation($postData, $ticketId) {
        
    }

}

?>