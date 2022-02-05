<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('user_id','DESC');
        return $query = $this->db->get('data_user');
    }
    public function get($id = null)
    {
        $this->db->from('data_user')
                ->order_by('user_id','DESC');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function editdata($table, $primary, $id, $data)
    {
        return $this->db->where($primary, $id)
            ->update($table, $data);
    }

    public function hapusdata($table, $id, $primary)
    {
        return $this->db->delete($table, array($primary => $id));
    }
    public function simpandata($table,$data){
        return $this->db->insert($table,$data);

    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('data_user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }

    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
}
