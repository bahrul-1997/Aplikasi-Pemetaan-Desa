<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa_m extends CI_Model
{

    function data()
    {
        $this->db->select('data_pemetaan.*, data_dusun.nama_dusun as dusun_nama');
        $this->db->from('data_pemetaan');
        $this->db->order_by('pemetaan_id', 'desc');
        $this->db->join('data_dusun', 'data_dusun.dusun_id = data_pemetaan.dusun_id');
        return $this->db->get()->result();
    }
    public function get($id = null)
    {
        $this->db->select('data_pemetaan.*, data_dusun.nama_dusun as dusun_nama');
        $this->db->from('data_pemetaan')
        ->order_by('pemetaan_id','DESC');
        $this->db->join('data_dusun', 'data_dusun.dusun_id = data_pemetaan.dusun_id' );
        if ($id != null) {
            $this->db->where('pemetaan_id', $id);
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
