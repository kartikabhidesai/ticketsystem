<?php

class Invoice_model extends My_model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Client_model', 'Client_model');
    }

    function addInvoice($postData) {
        $data['insert']['client_id'] = $postData['client_id'];
        $data['insert']['ref_no'] = $postData['ref_no'];
        $data['insert']['due_date'] = date('Y-m-d', strtotime($postData['due_date']));
        $data['insert']['default_tax'] = $postData['default_tax'];
        $data['insert']['discount'] = $postData['discount'];
        $data['insert']['currency'] = $postData['currency'];
        $data['insert']['note'] = $postData['notes'];
        $data['insert']['dt_created'] = DATE_TIME;
        $data['insert']['dt_updated'] = DATE_TIME;
        $data['table'] = TABLE_INVOICE;
        $result = $this->insertRecord($data);
        $objHistory = array(
            'description' => "created INVOICE #" . $postData['ref_no'],
            'invoiceId' => $result,
            'userId' => $this->session->userdata['valid_login']['id'],
        );
        unset($data);
        if ($result) {
            $this->addHistory($objHistory);
            return true;
        } else {
            return false;
        }
    }

    function getInvoiceList() {

        $data['select'] = ['inv.*', 'SUM(invDetail.total) as totalPrice',
            'usr.first_name', 'usr.last_name',
        ];
        $data['join'] = [
            TABLE_USER . ' as usr' => [
                'usr.id = inv.client_id',
                'LEFT',
            ],
            TABLE_INVOICE_DETAILS . ' as invDetail' => [
                'invDetail.invoice_id = inv.id',
                'LEFT',
            ],
        ];

        $data['groupBy'] = ['inv.id'];
        $data['table'] = TABLE_INVOICE . ' as inv';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function editInvoice($postData) {

        $data['update']['client_id'] = $postData['client_id'];
        $data['update']['ref_no'] = $postData['ref_no'];
        $data['update']['recur_every'] = $postData['recure_every'];
        $data['update']['due_date'] = date('Y-m-d', strtotime($postData['due_date']));
        $data['update']['start_date'] = date('Y-m-d', strtotime($postData['start_date']));
        $data['update']['end_date'] = date('Y-m-d', strtotime($postData['end_date']));
        $data['update']['default_tax'] = $postData['default_tax'];
        $data['update']['discount'] = $postData['discount'];
        $data['update']['currency'] = $postData['currency'];
        $data['update']['note'] = $postData['notes'];
        $data['where'] = ['id' => $postData['id']];
        $data['table'] = TABLE_INVOICE;
        $result = $this->updateRecords($data);
        unset($data);
        if ($result) {
            $objHistory = array(
                'description' => $this->session->userdata['valid_login']['firstname'] . " edited INVOICE #" . $postData['ref_no'],
                'invoiceId' => $postData['id'],
                'userId' => $this->session->userdata['valid_login']['id'],
            );
            $this->addHistory($objHistory);
            return true;
        } else {
            return false;
        }
    }

    function generateInvoiceNos() {
        $newInvoice = '';
        $query = $this->db->from(TABLE_INVOICE)->order_by("id", "desc")->get()->row();
        $totalLength = (7 - strlen($query->id));
        $invoiceFix = 'INV';
        $newInvoiceNo = str_pad($invoiceFix, $totalLength, "0");
        $newInvoice = $newInvoiceNo . ($query->id + 1);
        return $newInvoice;
    }

    function getInvoiceById($id) {
        $data['select'] = ['inv.*',
            'usr.first_name',
            'usr.last_name',
            'c.name as companyName',
            'c.phone as companyPhone',
            'c.address as companyAddress',
            'c.city as companyCity',
            'con.name as countryName',
            'inv.*',
        ];

        if ($id) {
            $data['where'] = ['inv.id' => $id];
        }
        $data['join'] = [
            TABLE_USER . ' as usr' => [
                'usr.id = inv.client_id',
                'LEFT',
            ],
            TABLE_COMPANY . ' as c' => [
                'c.id = usr.company_id',
                'LEFT',
            ],
            TABLE_COUNTRIES . ' as con' => [
                'con.id = c.country_id',
                'LEFT',
            ],
        ];
        $data['table'] = TABLE_INVOICE . ' as inv';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    public function addInvoiceDetails($postData) {
        $data['insert']['invoice_id'] = $postData['id'];
        $data['insert']['item_name'] = $postData['item_name'];
        $data['insert']['item_desc'] = $postData['item_desc'];
        $data['insert']['quentity'] = $postData['quentity'];
        $data['insert']['price'] = $postData['price'];
        $data['insert']['total'] = $postData['price'] * $postData['quentity'];
        $data['insert']['dt_created'] = DATE_TIME;
        $data['insert']['dt_updated'] = DATE_TIME;
        $data['table'] = TABLE_INVOICE_DETAILS;
        $result = $this->insertRecord($data);
        unset($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getInvoicePaymentDetails($invoiceId) {

        $data['select'] = ['inv.*', 'invDetail.price', 'invDetail.item_name',
            'invDetail.item_desc', 'invDetail.quentity', 'invDetail.id as paymentId',
        ];
        $data['where'] = ['inv.id' => $invoiceId];
        $data['join'] = [
            TABLE_INVOICE_DETAILS . ' as invDetail' => [
                'invDetail.invoice_id = inv.id',
                'LEFT',
            ],
        ];
        $data['table'] = TABLE_INVOICE . ' as inv';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function deletePaymentInvoice($data) {
        $this->db->where('id', $data['id']);
        $result = $this->db->delete(TABLE_INVOICE_DETAILS);

        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Invoice delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function addHistory($postData) {
        $data['insert']['invoice_id'] = $postData['invoiceId'];
        $data['insert']['history_desc'] = $postData['description'];
        $data['insert']['user_id'] = $postData['userId'];
        $data['insert']['dt_created'] = DATE_TIME;
        $data['insert']['dt_updated'] = DATE_TIME;
        $data['table'] = TABLE_INVOICE_HISTORY;
        $result = $this->insertRecord($data);
        unset($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getHistoryList($invoiceId) {

        $data['select'] = ['invHis.*', 'usr.first_name', 'usr.last_name',];
        $data['join'] = [
            TABLE_INVOICE . ' as inv' => [
                'inv.id = invHis.invoice_id',
                'LEFT',
            ],
            TABLE_USER . ' as usr' => [
                'usr.id = invHis.user_id',
                'LEFT',
            ],
        ];
        $data['where'] = ['invoice_id' => $invoiceId];
        $data['table'] = TABLE_INVOICE_HISTORY . ' as invHis';
        $result = $this->selectFromJoin($data);
        return $result;
    }

}

?>