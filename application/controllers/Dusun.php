<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dusun extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model('dusun_m');
        
    }
	public function index()
	{
        $data['dusun'] = $this->dusun_m->get();
		$this->template->load('template','data_desa/data_dusun/dusun_data',$data);
    }

    public function simpan()
    {
        $data = array(
            'nama_dusun' => $this->input->post('dusun'),
            'keterangan' => $this->input->post('ket')
            
        );
         $query = $this->dusun_m->simpandata('data_dusun', $data);
         if ($query) {
            $this->session->set_flashdata('info', 'Data dusun Berhasil Di Simpan');
            redirect('dusun');
        } else {
            $this->session->set_flashdata('info', 'Data dusun gagal Di Simpan');
            redirect('dusun');
        }
    }

    public function edit(){
        $id = $this->input->post('id');
        $data = array(
            'nama_dusun' => $this->input->post('dusun'),
            'keterangan' => $this->input->post('ket')
        );
        $query = $this->dusun_m->editdata('data_dusun', 'dusun_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data dusun Berhasil Di Simpan');
            redirect('dusun');
        } else {
            $this->session->set_flashdata('info', 'Data dusun gagal Di Simpan');
            redirect('dusun');
        }
    }

    public function hapus($id)
    {
        $this->dusun_m->hapusdata('data_dusun', $id, 'dusun_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data dusun berhasil di hapus');
            redirect('dusun');
        } else {
            $this->session->set_flashdata('info', 'data dusun gagal terhapus');
            redirect('dusun');
        }
    }
    
   
   
}
