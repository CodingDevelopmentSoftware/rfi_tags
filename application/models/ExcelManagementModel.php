<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExcelManagementModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCurrentCompnayProjectName(int $jobId = 0): ?object
    {
        return $this->db
            ->select('cid, pid, cm.company_name, p.project_name')
            ->from('project_management as p')
            ->join('company_management as cm', 'cm.cid = p.company_id')
            ->where(['p.pid' => $jobId])
            ->get()
            ->row();
    }
}
