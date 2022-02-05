<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model(['desa_m','data_desa_m']);
        $this->load->library('googlemaps');
        
    }
	public function index()
	{
        $data['desa'] = $this->desa_m->get();
		$this->template->load('template','desa/desa_data',$data);
    }

    public function tambah()
	{
        $data['data_desa'] = $this->data_desa_m->get()->result();


        $config['center'] = '-7.761956, 113.487752';
        $config['zoom'] = '15';
        $this->googlemaps->initialize($config);
        
        $marker['position'] = '-7.761956, 113.487752';
        $marker['draggable']= true;
        $marker['ondragend']= 'setToForm(event.latLng.lat(),event.latLng.lng())';
        $this->googlemaps->add_marker($marker); 
        
        $data['maps'] = $this->googlemaps->create_map();

		$this->template->load('template','desa/tambah',$data);
    }

    public function edit_desa()
	{
        $data['data_desa'] = $this->data_desa_m->get()->result();


        $config['center'] = '-7.761956, 113.487752';
        $config['zoom'] = '15';
        $this->googlemaps->initialize($config);
        
        $marker['position'] = '-7.761956, 113.487752';
        $marker['draggable']= true;
        $marker['ondragend']= 'setToForm(event.latLng.lat(),event.latLng.lng())';
        $this->googlemaps->add_marker($marker); 
        
        $data['maps'] = $this->googlemaps->create_map();

		$this->template->load('template','desa/edit',$data);
    }

    public function simpan()
    {
        $total = $this->input->post('total');
        $warkin = $this->input->post('warkin');
        $warme = $this->input->post('warme');
        $warka = $this->input->post('warka');

        $miskin = $warkin / 100 * $total;
        $menengah = $warme / 100 * $total;
        $kaya = $warka / 100 * $total;


        $data = array(
            'dusun_id' => $this->input->post('dusun_id'),
            'total' => $this->input->post('total'),
            'warkin' => $miskin,
            'warme' => $menengah,
            'warka' => $kaya,
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude')
        );
         $query = $this->desa_m->simpandata('data_pemetaan', $data);
         if ($query) {
            $this->session->set_flashdata('info', 'Data desa Berhasil Di Simpan');
            redirect('desa');
        } else {
            $this->session->set_flashdata('info', 'Data desa gagal Di Simpan');
            redirect('desa');
        }
    }

    public function edit(){
        $id = $this->input->post('id');
        $data = array(
            'nama_desa' => $this->input->post('desa'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'keterangan' => $this->input->post('ket')
        );
        $query = $this->desa_m->editdata('data_desa', 'desa_id', $id, $data);
        if ($query) {
            $this->session->set_flashdata('info', 'Data desa Berhasil Di Simpan');
            redirect('desa');
        } else {
            $this->session->set_flashdata('info', 'Data desa gagal Di Simpan');
            redirect('desa');
        }
    }

    public function hapus($id)
    {
        $this->desa_m->hapusdata('data_pemetaan', $id, 'pemetaan_id');
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'data desa berhasil di hapus');
            redirect('desa');
        } else {
            $this->session->set_flashdata('info', 'data desa gagal terhapus');
            redirect('desa');
        }
    }
    
   
   
}
