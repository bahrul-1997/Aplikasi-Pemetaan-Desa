<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_desa extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model(['data_desa_m','dusun_m']);
        
    }
	public function index()
	{
        $data['data_desa'] = $this->data_desa_m->get()->result();
        $data['dusun'] = $this->dusun_m->get()->result();
		$this->template->load('template','data_desa/data_desa/desa_data',$data);
    }

    public function simpan()
    {
        $laki = $this->input->post('jml_laki');
        $perempuan = $this->input->post('jml_perempuan');
        $total = $laki + $perempuan;
        $data = array(
            'dusun_id' => $this->input->post('dusun'),
            'jml_laki' =>$this->input->post('jml_laki'),
            'jml_perempuan' => $this->input->post('jml_perempuan'),
            'total' => $total,
            'deskripsi' => $this->input->post('deskripsi')
            
        );
         $query = $this->data_desa_m->simpandata('data_desa', $data);
         if ($query) {
            $this->session->set_flashdata('info', 'Data data_desa Berhasil Di Simpan');
            redirect('data_desa');
        } else {
            $this->session->set_flashdata('info', 'Data data_desa gagal Di Simpan');
            redirect('data_desa');
        }
    }

    public function edit(){
        $id = $this->input->post('id');
        $laki = $this->input->post('jml_laki');
        $perempuan = $this->input->post('jml_perempuan');
        $total = $laki + $perempuan;

        $data = array(
            'dusun_id' => $this->input->post('dusun'),
            'jml_laki' =>$this->input->post('jml_laki'),
            'jml_perempuan' => $this->input->post('jml_perempuan'),
            'total' => $total,
            'deskripsi' => $this->input->post('deskripsi')
        );
        $query = $this->data_desa_m->editdata('data_desa', 'desa_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data desa Berhasil Di Ubah');
            redirect('data_desa');
        } else {
            $this->session->set_flashdata('info', 'Data desa gagal Di Ubah');
            redirect('data_desa');
        }
    }

    public function hapus($id)
    {
        $this->data_desa_m->hapusdata('data_desa', $id, 'desa_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data desa berhasil di hapus');
            redirect('data_desa');
        } else {
            $this->session->set_flashdata('info', 'data desa gagal terhapus');
            redirect('data_desa');
        }
    }
    
   
   
}
