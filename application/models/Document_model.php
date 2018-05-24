<?php

class Document_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    function getLabelDetaild() {
        $data['select'] = ['id', 'title', 'company_id'];
        $data['table'] = TABLE_LABEL;
        $result = $this->selectRecords($data);
        return $result;
    }

    function getDocumentDetail() {
        $data['select'] = [
            'docs.id', 'docs.document_name', 'docs.company_id',
            'cmp.name as company_name', 'docs.dt_created',
        ];
        $data['table'] = TABLE_DOCUMENT . ' docs';
        $data['join'] = [
            TABLE_COMPANY . ' as cmp' => [
                'cmp.id = docs.company_id',
                'LEFT',
            ],
        ];
//        $data['where'] = ['docs.id' => $companyId];
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function addDocument($postData) {
        $data ['where'] = [
            'document_name' => $postData['document_name']
        ];
        $data ['table'] = TABLE_DOCUMENT;
        $response = $this->isDuplicate($data);
        if ($response > 0) {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Document Name already exists';
        } else {
            $data['insert']['document_name'] = $postData['document_name'];
            $data['insert']['company_id'] = $postData['company_id'];
            $data['insert']['dt_created'] = DATE_TIME;
            $data['insert']['dt_updated'] = DATE_TIME;
            $data['table'] = TABLE_DOCUMENT;
            $labelId = $this->insertRecord($data);

            unset($data);
            if ($labelId) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Document add successfully';
                $json_response['redirect'] = admin_url() . 'document';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
            }
        }
        return $json_response;
    }

    function companyDetail($companyId) {
        $data['select'] = [
            'c.name as companyName', 'c.email as companyEmail',
            'c.phone as companyPhone', 'c.address as companyAddress', 'c.city', 'c.id as companyId',
            'c.country_id', 'ct.name as countyName'];
        $data['table'] = TABLE_COMPANY . ' c';
        $data['join'] = [
            TABLE_COUNTRIES . ' as ct' => [
                'c.country_id = ct.id',
                'LEFT',
            ],
        ];
        $data['where'] = ['c.id' => $companyId];
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function editDocument($postData) {
//        print_r($postData);exit;
        $data['update']['document_name'] = $postData['documentName'];
        $data['update']['company_id'] = $postData['company_id'];
        $data['update']['dt_updated'] = DATE_TIME;
        $data['where'] = ['id' => $postData['documentId']];
        $data['table'] = TABLE_DOCUMENT;
        $result = $this->updateRecords($data);
        unset($data);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Document edit successfully';
            $json_response['redirect'] = admin_url() . 'document';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }

        return $json_response;
    }

    function deleteDocs($data) {
        $this->db->where('id', $data['docsId']);
        $result = $this->db->delete(TABLE_DOCUMENT);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Document delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function deleteDocumentInfo($data) {
        $this->db->where('id', $data['docsId']);
        $result = $this->db->delete(TABLE_DOCUMENT_ITEM);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Document Item delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function addDocsItem($postData) {
//        print_r($postData);exit;
        $data ['where'] = [
            'document_value' => $postData['item_value']
        ];
        $data ['table'] = TABLE_DOCUMENT_ITEM;
        $response = $this->isDuplicate($data);
        if ($response > 0) {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Value already exists';
        } else {
            $data['insert']['document_date'] = date('Y-m-d', strtotime($postData['item_date']));
            $data['insert']['document_value'] = $postData['item_value'];
            $data['insert']['document_id'] = $postData['docsId'];
            $data['insert']['dt_created'] = DATE_TIME;
            $data['insert']['dt_updated'] = DATE_TIME;
            $data['table'] = TABLE_DOCUMENT_ITEM;
            $labelId = $this->insertRecord($data);
            unset($data);
            if ($labelId) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Document Item add successfully';
                $json_response['redirect'] = admin_url() . 'document';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
            }
        }

        return $json_response;
    }

    function getLabelinfo($companyId){
        $data['select'] = ['lab.id', 'lab.title', 'lab.company_id'];
        $data['table'] = TABLE_LABEL.' as lab';
        $data['where'] = ['lab.company_id' => $companyId];
        $result = $this->selectRecords($data);
        $json_encode = json_encode($result);
        $json_decodeArr = json_decode($json_encode,true);
        $finalArr = array();
        
        for($i=0;$i<count($json_decodeArr);$i++)
        {
            $data['select'] = ['li.item_date', 'li.item_value'];
            $data['table'] = TABLE_LABEL_ITEM.' as li';
            $data['where'] = ['li.label_id' => $json_decodeArr[$i]['id']];
            $data['order'] = 'li.id desc';
            $data['limit'] = '1,1';
            $resultArr = $this->selectRecords($data); 
            $finalArr[$i]['id'] = $json_decodeArr[$i]['id'];
            $finalArr[$i]['title'] = $json_decodeArr[$i]['title'];
            $finalArr[$i]['company_id'] = $json_decodeArr[$i]['company_id'];
            $finalArr[$i]['item_date'] = $resultArr[0]->item_date;
            $finalArr[$i]['item_value'] = $resultArr[0]->item_value; 
        }
        return $finalArr;
    }
    
    
    function getClientDocumentDetail($companyId) {
        $data['select'] = ['docsItem.document_date','docsItem.document_value',
            'docs.id', 'docs.document_name', 'docs.company_id',
            'cmp.name as company_name', 'docs.dt_created',
        ];
        $data['table'] = TABLE_DOCUMENT . ' docs';
        $data['join'] = [
            TABLE_COMPANY . ' as cmp' => [
                'cmp.id = docs.company_id',
                'LEFT',
            ],
            TABLE_DOCUMENT_ITEM . ' as docsItem' => [
                'docsItem.document_id = docs.id',
                'LEFT',
            ],
        ];
        $data['where'] = ['docs.company_id' => $companyId];
        $result = $this->selectFromJoin($data);
        return $result;
    }
}

?>