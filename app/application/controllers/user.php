<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('My_model','m');
		$this->load->helper('url');
		$this->load->helper('form');
		
	}	
	public function index(){
		$data['tittle'] = 'Profil saya';
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('user/index');
		$this->load->view('template/footer');
	}
	function ambildata(){
		$model = new My_model();
		$data = $model->ambilData();
		echo json_encode($data);
	}
	function ambilDataKaryawan(){
		$model = new My_model;        
		$karyawan = $this->input->post('idkaryawan'); //Menangkap inputan no induk
        $data = $model->AmbilIdKaryawan($karyawan); // Menampung value return dari fungsi getDataByNoinduk ke variabel data
        echo json_encode($data); // Mengencode variabel data menjadi json format
    }
    function updateData(){
    	$model = new My_model();
        $idkaryawan    = $this->input->post('idkaryawan');
        $namalengkap   = $this->input->post('namalengkap');
        $email     	= $this->input->post('email');
        $nohp       = $this->input->post('nohp');
        $foto       = $this->input->post('foto');
 
        $data = ['idkaryawan' => $idkaryawan, 'namalengkap' => $namalengkap, 'email' => $email , 'nohp' => $nohp,'foto' => $foto];
 
        $data = $model->updateData($idkaryawan,$data);
         
        echo json_encode($data); // Mengencode variabel data menjadi json format
    }
    function hapusData(){
    	$model = new My_model();
        $idkaryawan = $this->input->post('idkaryawan');
        $data = $model->hapusData($idkaryawan);
        echo json_encode($data); // Mengencode variabel data menjadi json format
    }
	

}