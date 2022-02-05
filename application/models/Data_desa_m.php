<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_desa_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('data_desa as b');
        $this->db->join('data_dusun as k', 'k.dusun_id = b.dusun_id');

        $this->db->order_by('b.desa_id', 'DESC');
        return $query = $this->db->get();
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

    
}
