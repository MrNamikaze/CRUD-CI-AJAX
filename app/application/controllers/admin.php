<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	public function index(){
		$data['tittle'] = 'Profil admin';
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('template/footer');
	}
}