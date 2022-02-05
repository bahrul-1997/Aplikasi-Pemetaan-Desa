<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemetaan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        check_tidak_login();
        $this->load->model('desa_m');
        $this->load->library('Googlemaps');
        
    }
	public function index()
	{
        $config['center'] = '-7.763264, 113.486207';
        $config['zoom'] = '15';
        $this->googlemaps->initialize($config);

        //====PEMETAAN=====\\

        $desa = $this->desa_m->data();
        foreach ($desa as $key => $value) {
            $marker = array();
            $marker['position'] = "$value->latitude,$value->longitude";
            $marker['animation']="BOUNCE";
            $marker['infowindow_content'] = '<div class="media" style="width:250px; padding-right: 0px; padding-bottom: 0px;">';
            $marker['infowindow_content'] .= '<div class="media-body">';
            $marker['infowindow_content'] .= '<center>'. '<h5>Dusun ' .$value->dusun_nama.'</h5>'.'</center>';
            $marker['infowindow_content'] .= '<br>Total Penduduk : '.$value->total.'</br>';
            $marker['infowindow_content'] .= '<br>Jumalah Warga Miskin : '.$value->warkin.' '.'jiwa'.' '.'/'.' '.round($value->warkin * 100 / $value->total).'%</br>';
            $marker['infowindow_content'] .= '<br> Jumalah Warga Menengah : '.$value->warme.' '.'jiwa'.' '.'/'.' '.round($value->warme * 100 / $value->total).'%</br>';
            $marker['infowindow_content'] .= '<br>Jumalah Warga Kaya : '.$value->warka.' '.'jiwa'.' '.'/'.' '.round($value->warka * 100 / $value->total).'%</br>';
            $marker['infowindow_content'] .= '</div>';
            $marker['infowindow_content'] .= '</div>';
            $this->googlemaps->add_marker($marker);   
        }

        //====PEMETAAN=====\\
        
        $this->googlemaps->add_marker($marker); 
        
        $data['maps'] = $this->googlemaps->create_map();

		$this->template->load('template','pemetaan/pemetaan_data',$data);
    }

   
   
   
}
