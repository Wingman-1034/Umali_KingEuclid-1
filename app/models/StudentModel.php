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

    public function get_all($q, $records_per_page = null, $page = null)
    {
        if (is_null($page)) {
            return $this->db->table('students')->get_all();
        } else {
            $query = $this->db->table('students');

            // Build LIKE conditions
            $query->like('id', '%'.$q.'%')
                ->or_like('first_name', '%'.$q.'%')
                ->or_like('last_name', '%'.$q.'%')
                ->or_like('birthdate', '%'.$q.'%')
                ->or_like('email', '%'.$q.'%')
                ->or_like('added', '%'.$q.'%');

            // Clone before pagination
            $countQuery = clone $query;

            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                            ->get()['count'];

            $data['records'] = $query->pagination($records_per_page, $page)
                                    ->get_all();

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