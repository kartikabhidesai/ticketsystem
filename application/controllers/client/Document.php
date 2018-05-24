<?php

class Document extends Client_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Document_model', 'this_model');
        $this->load->model('Client_model', 'Client_model');
    }

    function index() {
        $data['page'] = "client/document/list";
        $data['document'] = 'active';
        $data['pagetitle'] = 'Document';
        $data['var_meta_title'] = 'Document';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'document' => 'Document List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'plugins/datapicker/bootstrap-datepicker.js',
            'client/document.js',
        );
        $data['init'] = array(
            'Document.documentList()',
        );
        $data['companyName'] = $this->Client_model->getcompanyDetail();
        $data['docsArray'] = $this->this_model->getDocumentDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function getDocumentItemInfo() {
        if ($this->input->post()) {

            $data['lableInfo'] = $this->this_model->getClientDocumentDetail($this->session->userdata['client_login']['companyId']);
//            $data['lableInfo'] = $this->db->get_where(TABLE_DOCUMENT_ITEM, array('document_id' => $this->input->post('docsId')))->result_array();
//            print_r($data['lableInfo']);
//            exit;
            $html = $this->load->view('client/document/append', $data, TRUE);
//            echo $html;
//            exit;
            echo json_encode($html);
            exit();
        }
    }

}

?>