<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public function getDataByLimitOffsetOrderBy(
        string $tableName = '',
        string $select = '',
        int $limit = 10,
        int $offset = 0,
        string $order_by = 'ASC'
    ): array {
        return $this->db->select($select)->limit($limit, $offset)->order_by($order_by)->get($tableName)->result();
    }

    public function getByTableName(
        string $tableName
    ): array {
        return $this->db->get($tableName)->result();
    }

    public function getSingleRowWithWhere(
        string $select = '*',
        string $tableName = '',
        array $whereData = []): object {
            return $this->db->select($select)->where($whereData)->get($tableName)->row();
    }

    public function insertData(
        string $table = '',
        array $data = []
    ): int {
        $this->db->trans_begin();
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        if ($this->db->affected_rows()) {
            $this->db->trans_commit();
            return  $insert_id;
        } else {
            $this->db->trans_rollback();
            return 0;
        }
    }

    public function updateData(
        array $where = [],
        array $data = []
    ): int {
        $this->db->trans_begin();
        $this->db->where($where);
        $this->db->update($this->table, $data);
        if ($this->db->affected_rows()) {
            $this->db->trans_commit();
            return  1;
        } else {
            $this->db->trans_rollback();
            return 0;
        }
    }

    public function deleteData(
        array $where = []
    ): int {
        $this->db->trans_begin();
        $this->db->where($where);
        $this->db->delete($this->table);
        if ($this->db->affected_rows()) {
            $this->db->trans_commit();
            return  1;
        } else {
            $this->db->trans_rollback();
            return 0;
        }
    }
}
