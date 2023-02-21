<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectManagmentModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProjects(): array
    {
        return $this->db
            ->select('p.*,cm.company_name')
            ->from('project_management as p')
            ->join('company_management as cm ', 'cm.cid = p.company_id')
            // ->where('')
            ->get()
            ->result();
    }

    public function getProjectWithWhere(int $id = 0): ?object
    {
        return $this->db
            ->select('p.*,c.company_name, u2.first_name as created_by, u3.first_name as modified_by')
            ->from('project_management as p')
            ->join('company_management as c', 'c.cid = p.company_id')
            ->join('user_management as u2', 'p.created_by = u2.user_id')
            ->join('user_management as u3', 'p.modified_by = u3.user_id', 'left')
            ->where(['p.pid' => $id])
            ->get()
            ->row();
    }
}
