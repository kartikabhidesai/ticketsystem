<?php

class Invoice extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Client_model', 'this_model');
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
        $data['getComany'] = $this->this_model->getcompanyDetail();
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

        $data['country'] = $this->this_model->countryList();
        if ($this->input->post()) {
            $res = $this->this_model->addCompany($this->input->post());
            echo json_encode($res);
            exit();
        }
        $clientId = '';
        $data['client_list'] = $this->Client_model->getReporterDetail($clientId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
        $companyId = $this->utility->decode($id);

        if (!ctype_digit($companyId)) {
//            redirect(admin_url().'invoice');
        }

        $data['page'] = "admin/invoice/edit";
        $data['client'] = 'active';
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
            'Invoice.invoiceAdd()',
        );

        $data['country'] = $this->this_model->countryList();
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);

        if ($this->input->post()) {
            $res = $this->this_model->editCompany($this->input->post(), $companyId);
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function detail($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
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
        $data['companyId'] = $companyId;
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($companyId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function view($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
//            return(admin_url().'client');
        }
        $data['page'] = "admin/invoice/view";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Invoice Preview';
        $data['var_meta_title'] = 'Invoice Preview';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Invoice Preview',
        );
        $data['css'] = array('plugins/dataTables/datatables.min.css');

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientDetail()',
        );
        $data['companyId'] = $companyId;
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($companyId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }
    function history($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
//            return(admin_url().'client');
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
        $data['companyId'] = $companyId;
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($companyId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function addUpdatePerson() {

        if ($this->input->post()) {
            if ($this->input->post('person_id')) {
                $res = $this->this_model->editCompanyUsers($this->input->post());
            } else {
                $res = $this->this_model->addCompanyUsers($this->input->post(), $this->input->post('company_id'));
            }

            if ($res) {
                if (is_array($res)) {
                    echo json_encode($res);
                    exit();
                } else {
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Person add successfully';
                    $json_response['redirect'] = admin_url() . 'client/detail/' . $this->utility->encode($this->input->post('company_id'));
                    echo json_encode($json_response);
                    exit();
                }
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
                echo json_encode($json_response);
                exit();
            }
        }
    }

    function getPersonInfo() {
        if ($this->input->post()) {
            $result = $this->db->get_where(TABLE_USER, array('id' => $this->input->post('personId'), 'company_id' => $this->input->post('companyId')))->result_array();
            echo json_encode($result);
            exit();
        }
    }

    function deletePerson() {
        if ($this->input->post()) {
            $result = $this->this_model->deletePerson($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

    function clientDelete() {
        if ($this->input->post()) {
            $result = $this->this_model->deleteClient($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

}

?>