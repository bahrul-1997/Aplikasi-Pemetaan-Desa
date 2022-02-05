<?php

Class Fungsi{
    protected $ci;
    function __construct()
    {
        $this->ci = & get_instance();
    }
    function user_login(){
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $userdata= $this->ci->user_m->get($user_id)->row();
        return $userdata;
    }

    public function data_kacamata(){
        $this->ci->load->model('kacamata_m');
        return $this->ci->kacamata_m->get()->num_rows();
    }

    public function data_transaksi(){
        $this->ci->load->model('r_transaksi_m');
        return $this->ci->r_transaksi_m->get()->num_rows();
    }
    public function data_pelanggan(){
        $this->ci->load->model('pelanggan_m');
        return $this->ci->pelanggan_m->get()->num_rows();
    }
    public function data_suplier(){
        $this->ci->load->model('suplier_m');
        return $this->ci->suplier_m->get()->num_rows();
    }
}