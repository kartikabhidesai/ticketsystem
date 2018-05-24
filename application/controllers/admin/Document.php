<?php

class Document extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Document_model', 'this_model');
        $this->load->model('Client_model', 'Client_model');
    }

    function index() {
        $data['page'] = "admin/document/list";
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
            'admin/document.js',
        );
        $data['init'] = array(
            'Document.documentList()',
        );
        $data['companyName'] = $this->Client_model->getcompanyDetail();
        $data['docsArray'] = $this->this_model->getDocumentDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    public function addDoument() {
//        print_r($this->input->post());exit;
        $res = $this->this_model->addDocument($this->input->post());
        echo json_encode($res);
        exit();
    }

    public function editDocument() {
        $res = $this->this_model->editDocument($this->input->post());
        echo json_encode($res);
        exit();
    }

    public function deleteDocument() {
        if ($this->input->post()) {
            $result = $this->this_model->deleteDocs($this->input->post());
            echo json_encode($result);
            exit();
        }
    }
    public function deleteDocumentInfo() {
        if ($this->input->post()) {
            $result = $this->this_model->deleteDocumentInfo($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

    function getdocsInfo() {
        if ($this->input->post()) {
            $result = $this->db->get_where(TABLE_DOCUMENT, array('id' => $this->input->post('docsId')))->row_array();
            echo json_encode($result);
            exit();
        }
    }

    function getDocumentItemInfo() {
        if ($this->input->post()) {
            $data['lableInfo'] = $this->db->get_where(TABLE_DOCUMENT_ITEM, array('document_id' => $this->input->post('docsId')))->result_array();
//           print_r($data['lableInfo']);exit;
            $html = $this->load->view('admin/document/append', $data,TRUE);
//            echo $html;
//            exit;
            echo json_encode($html);
            exit();
        }
    }

    public function addDocsItem() {
        $res = $this->this_model->addDocsItem($this->input->post());
        echo json_encode($res);
        exit();
    }

}

?>