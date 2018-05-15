<?php

class Label_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    function getLabelDetaild() {
        $data['select'] = ['id', 'title', 'company_id'];
        $data['table'] = TABLE_LABEL;
        $result = $this->selectRecords($data);
        return $result;
    }

    function getLabelDetail() {
        $data['select'] = [
            'lbl.id', 'lbl.title', 'lbl.company_id',
            'cmp.name as company_name', 'lbl.dt_created',
        ];
        $data['table'] = TABLE_LABEL . ' lbl';
        $data['join'] = [
            TABLE_COMPANY . ' as cmp' => [
                'cmp.id = lbl.company_id',
                'LEFT',
            ],
        ];
//        $data['where'] = ['lbl.id' => $companyId];
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function addLabel($postData) {
        $data ['where'] = [
            'title' => $postData['title']
        ];
        $data ['table'] = TABLE_LABEL;
        $response = $this->isDuplicate($data);
        if ($response > 0) {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Title already exists';
        } else {
            $data['insert']['title'] = $postData['title'];
            $data['insert']['company_id'] = $postData['company_id'];
            $data['insert']['dt_created'] = DATE_TIME;
            $data['insert']['dt_updated'] = DATE_TIME;
            $data['table'] = TABLE_LABEL;
            $labelId = $this->insertRecord($data);

            unset($data);
            if ($labelId) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Label add successfully';
                $json_response['redirect'] = admin_url() . 'label';
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

    function editLable($postData) {
        $data['update']['title'] = $postData['title'];
        $data['update']['company_id'] = $postData['company_id'];
        $data['update']['dt_updated'] = DATE_TIME;
        $data['where'] = ['id' => $postData['labelId']];
        $data['table'] = TABLE_LABEL;
        $result = $this->updateRecords($data);
        unset($data);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Label edit successfully';
            $json_response['redirect'] = admin_url() . 'label';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }

        return $json_response;
    }

    function deleteLabel($data) {
        $this->db->where('id', $data['labelId']);
        $result = $this->db->delete(TABLE_LABEL);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Label delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function deleteLabelInfo($data) {
        $this->db->where('id', $data['labelId']);
        $result = $this->db->delete(TABLE_LABEL_ITEM);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Label Item delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function addItem($postData) {
        $data ['where'] = [
            'item_value' => $postData['item_value']
        ];
        $data ['table'] = TABLE_LABEL_ITEM;
        $response = $this->isDuplicate($data);
        if ($response > 0) {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Value already exists';
        } else {
            $data['insert']['item_date'] = date('Y-m-d', strtotime($postData['item_date']));
            $data['insert']['item_value'] = $postData['item_value'];
            $data['insert']['label_id'] = $postData['labelId'];
            $data['insert']['dt_created'] = DATE_TIME;
            $data['insert']['dt_updated'] = DATE_TIME;
            $data['table'] = TABLE_LABEL_ITEM;
            $labelId = $this->insertRecord($data);
            unset($data);
            if ($labelId) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Label Item add successfully';
                $json_response['redirect'] = admin_url() . 'label';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
            }
        }

        return $json_response;
    }

}

?>