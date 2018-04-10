<?php

class Invoice extends Client_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Invoice_model', 'this_model');
    }

    function index() {
        $data['page'] = "client/invoice/index";
        $data['sale'] = 'active';
        $data['invoice'] = 'active';
        $data['pagetitle'] = 'Invoice';
        $data['var_meta_title'] = 'Invoice';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'invoice' => 'Invoice List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/invoice.js',
        );
        $data['init'] = array(
            'Invoice.invoiceList()',
        );
//        print_r($this->session->userdata['client_login']);exit;
        $data['getInvoice'] = $this->this_model->getCompanyInvoiceList(null,$this->session->userdata['client_login']['companyId']);
        $this->load->view(CLIENT_LAYOUT, $data);
    }
   function view($id,$shortBy = null) {
        $invoiceId = $this->utility->decode($id);
        if (!ctype_digit($invoiceId)) {
            return(client_url() . 'invoice');
        }

        $data['page'] = "client/invoice/view";
        $data['invoice'] = 'active';
        $data['sale'] = 'active';
        $data['pagetitle'] = 'Invoice Preview';
        $data['var_meta_title'] = 'Invoice Preview';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Invoice Preview',
        );
        $data['js'] = array(
            'admin/invoice.js',
            'plugins/datapicker/bootstrap-datepicker.js',
        );
        $data['init'] = array(
            'Invoice.initEdit()',
        );

        if ($this->input->post()) {
            $res = $this->this_model->addInvoiceDetails($this->input->post());
            if ($res) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Invoice Details successfully.';
                $json_response['redirect'] = client_url() . 'invoice/view/' . $id;
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong.';
            }
            echo json_encode($json_response);
            exit();
        }
        $data['invoiceData'] = $this->this_model->getInvoiceById($invoiceId);
        $data['invoicepaymentData'] = $this->this_model->getInvoicePaymentDetails($invoiceId);
        $this->load->view(CLIENT_LAYOUT, $data);
    }

   
}

?>