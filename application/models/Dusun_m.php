<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dusun_m extends CI_Model
{

    function data()
    {
        $this->db->order_by('dusun_id','DESC');
        return $query = $this->db->get('data_dusun');
    }
    public function get($id = null)
    {
        $this->db->from('data_dusun')
                ->order_by('dusun_id','DESC');
        if ($id != null) {
            $this->db->where('dusun_id', $id);
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
}
