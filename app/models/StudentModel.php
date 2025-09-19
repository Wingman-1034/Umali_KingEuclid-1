<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: StudentModel
 * 
 * Automatically generated via CLI.
 */
class StudentModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($q = '', $records_per_page = null, $page = null)
    {
        if (is_null($records_per_page) || is_null($page)) {
            // No pagination, just return all
            return $this->db->table($this->table)->get_all();
        } else {
            $query = $this->db->table($this->table);

            // Only add search if $q is not empty
            if (!empty($q)) {
                $query->group_start()
                    ->like('id', '%'.$q.'%')
                    ->or_like('first_name', '%'.$q.'%')
                    ->or_like('last_name', '%'.$q.'%')
                    ->or_like('email', '%'.$q.'%')
                    ->group_end();
            }

            // Clone before pagination for total count
            $countQuery = clone $query;
            $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

            // Calculate offset
            $offset = ($page - 1) * $records_per_page;
            $data['records'] = $query->limit($records_per_page, $offset)->get_all();

            return $data;
        }
    }

    public function get($id)
    {
        return $this->db->table($this->table)->where($this->primary_key, $id)->get();
    }

    public function insert_data($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_data($id, $data)
    {
        return $this->db->table($this->table)->where($this->primary_key, $id)->update($data);
    }

    public function delete_data($id)
    {
        return $this->db->table($this->table)->where($this->primary_key, $id)->delete();
    }

    public function truncate()
    {
        return $this->db->raw("TRUNCATE TABLE {$this->table}");
    }
}