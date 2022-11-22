<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportsModel extends MY_Model
{

    public function getScannedtags() {
        return $this->db->select('t.type_of_tag, t.qr_and_bar_code_number , t.rfid_or_id, c.company_name, p.project_name')
        ->from('temp_excel as t')
        ->join('project_management as p', 'p.pid = t.project_id')
        ->join('company_management as c', 'c.cid = t.company_id')
        ->where(['t.status'=> 1])
        ->get()
        ->result();
    }
    public function getUnScannedtags() {
        return $this->db->select('t.type_of_tag, t.qr_and_bar_code_number , t.rfid_or_id, c.company_name, p.project_name')
        ->from('temp_excel as t')
        ->join('project_management as p', 'p.pid = t.project_id')
        ->join('company_management as c', 'c.cid = t.company_id')
        ->where(['t.status'=> 0])
        ->get()
        ->result();
    }
}

?>