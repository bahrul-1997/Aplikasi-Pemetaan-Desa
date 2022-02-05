<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->load->view('login');
		check_login();
	}
	public function proses(){
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])){
			$this->load->model('user_m');
			$query =$this->user_m->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level'=> $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
						alert('Selamat, Login berhasil');
						window.location='".site_url('pemetaan')."';
					 </script> ";
			}else{
				echo "<script>
						alert('gagal, username / password salah');
						window.location='".site_url('auth/login')."';
					 </script> ";
			}
		}
	}

	public function logout(){
		$params = array(
			'userid','level'
		);
		$this->session->unset_userdata($params);
		redirect('Auth/login');
	}
}
