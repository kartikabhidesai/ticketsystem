<?php

class Invoice extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Invoice_model', 'this_model');
        $this->load->model('Client_model', 'Client_model');
    }

    function index() {
        $data['page'] = "admin/invoice/index";
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
        $data['getInvoice'] = $this->this_model->getInvoiceList(null, null);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function add() {
        $data['page'] = "admin/invoice/add";
        $data['sale'] = 'active';
        $data['pay'] = 'active';
        $data['pagetitle'] = 'Invoice';
        $data['var_meta_title'] = 'Invoice';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Invoice Add',
        );
        $data['css'] = array(
            'plugins/datapicker/datepicker3.css',
        );

        $data['js'] = array(
            'admin/invoice.js',
            'plugins/datapicker/bootstrap-datepicker.js',
        );
        $data['init'] = array(
            'Invoice.invoiceAdd()',
        );

        if ($this->input->post()) {
            $res = $this->this_model->addInvoice($this->input->post());
            if ($res) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Invoice add successfully.';
                $json_response['redirect'] = admin_url() . 'invoice';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong.';
            }
            echo json_encode($json_response);
            exit();
        }
        $data['invoiceNo'] = $this->this_model->generateInvoiceNos();
        $clientId = '';
        $data['client_list'] = $this->Client_model->getReporterDetail($clientId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
        $invoiceId = $this->utility->decode($id);

        if (!ctype_digit($invoiceId)) {
            redirect(admin_url() . 'invoice');
        }

        $data['page'] = "admin/invoice/edit";
        $data['invoice'] = 'active';
        $data['sale'] = 'active';
        $data['pagetitle'] = 'Invoice';
        $data['var_meta_title'] = 'Invoice';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Invoice Edit',
        );
        $data['css'] = array();
        $data['js'] = array(
            'admin/invoice.js',
            'plugins/datapicker/bootstrap-datepicker.js',
        );
        $data['init'] = array(
            'Invoice.initEdit()',
        );
        $clientId = '';
        $data['client_list'] = $this->Client_model->getReporterDetail($clientId);
        $data['invoiceData'] = $this->this_model->getInvoiceById($invoiceId);

        if ($this->input->post()) {
//            print_r($this->input->post());
//            exit;
            $res = $this->this_model->editInvoice($this->input->post(), $invoiceId);
            if ($res) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Invoice Updated successfully.';
                $json_response['redirect'] = admin_url() . 'invoice';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong.';
            }
            echo json_encode($json_response);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function detail($id) {
        $invoiceId = $this->utility->decode($id);
        if (!ctype_digit($invoiceId)) {
//            return(admin_url().'client');
        }
        $data['page'] = "admin/invoice/detail";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Invoice Detail';
        $data['var_meta_title'] = 'Invoice Detail';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Invoice Detail',
        );
        $data['css'] = array('plugins/dataTables/datatables.min.css');

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientDetail()',
        );
        $data['companyId'] = $invoiceId;
        $data['companyDeatail'] = $this->this_model->companyDetail($invoiceId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($invoiceId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function view($id, $shortBy = null) {
        $invoiceId = $this->utility->decode($id);
        if (!ctype_digit($invoiceId)) {
            return(admin_url() . 'invoice');
        }

        $data['page'] = "admin/invoice/view";
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
                $json_response['redirect'] = admin_url() . 'invoice/view/' . $id;
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong.';
            }
            echo json_encode($json_response);
            exit();
        }
        $data['invoiceData'] = $this->this_model->getInvoiceById($invoiceId);
        $data['invoicepaymentData'] = $this->this_model->getInvoicePaymentDetails($invoiceId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function history($id) {
        $invoiceId = $this->utility->decode($id);
        if (!ctype_digit($invoiceId)) {
            return(admin_url() . 'invoice');
        }
        $data['page'] = "admin/invoice/history";
        $data['invoice'] = 'active';
        $data['sale'] = 'active';
        $data['pagetitle'] = 'Invoice history';
        $data['var_meta_title'] = 'Invoice history';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Invoice history',
        );
        $data['css'] = array('plugins/dataTables/datatables.min.css');

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientDetail()',
        );
        $data['invoiceId'] = $id;
        $data['historyArr'] = $this->this_model->getHistoryList($invoiceId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function deleteInvoice() {
        if ($this->input->post()) {
            $result = $this->this_model->deleteInvoice($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

    function paymentDelete() {
        if ($this->input->post()) {
            $result = $this->this_model->deletePaymentInvoice($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

    function pay($id) {
        $invoiceId = $this->utility->decode($id);
        if (!ctype_digit($invoiceId)) {
            return(admin_url() . 'invoice');
        }
        $data['page'] = "admin/invoice/pay";
        $data['invoice'] = 'active';
        $data['sale'] = 'active';
        $data['pagetitle'] = 'Invoice Pay';
        $data['var_meta_title'] = 'Invoice Pay';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Invoice' => 'Invoice Pay',
        );
        $data['js'] = array(
            'admin/invoice.js',
            'plugins/datapicker/bootstrap-datepicker.js',
            'plugins/switchery/switchery.js',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css',
            'plugins/switchery/switchery.css',
        );

        $data['init'] = array(
            'Invoice.payInit()',
        );
        if ($this->input->post()) {
//            print_r($this->input->post());exit;
            $res = $this->this_model->addPayment($this->input->post());
            if ($res) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Payment Add successfully.';
                $json_response['redirect'] = admin_url() . 'invoice/view/' . $id;
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong.';
            }
            echo json_encode($json_response);
            exit();
        }

        $data['invoiceId'] = $id;
        $data['tranNos'] = $this->this_model->generateTransactionNos();
        $data['invoicepaymentData'] = $this->this_model->getInvoiceList($invoiceId, null);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function pdf($id) {
        $invoiceId = $this->utility->decode($id);
        if (!ctype_digit($invoiceId)) {
            return(admin_url() . 'invoice');
        }

        $data['page'] = "admin/invoice/pdf";
//        $data['page'] = "admin/invoice/view";
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
        $data['invoiceData'] = $this->this_model->getInvoiceById($invoiceId);
        $data['invoicePaymentData'] = $this->this_model->getInvoicePaymentDetails($invoiceId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

}

?>