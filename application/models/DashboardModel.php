<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashBoardModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function totalCountActivites()
    {
        return $this->rawQuery("SELECT COUNT(project_id) as count FROM temp_excel GROUP BY project_id ORDER BY project_id ASC");
    }
    public function activeStatusInActiveStatus(bool $condition = false): ?int
    {
        $whereCondition = ($condition) ?  ['status' => 1] : ['status' => 0];
        return $this->getCount('temp_excel', $whereCondition);
    }
    public function getJobesTable()
    {
        return $this->rawQuery("SELECT p.project_name,COUNT(t.project_id) as count, t.project_id,t.status  FROM temp_excel as t INNER JOIN project_management as p ON p.pid=t.project_id GROUP BY t.project_id,t.status,p.project_name ORDER BY t.project_id ASC");
    }
}
