<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExcelManagmentModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCurrentCompnayProjectName()
    {
        return $this->db
            ->select('cid, pid, cm.company_name, pm.project_name')
            ->from('temp_excel as te')
            ->join('company_management as cm', 'cm.cid = te.company_id')
            ->join('project_management as pm', 'pm.pid = te.project_id')
            ->limit(1, 0)
            ->get()
            ->row();
    }
    
}
