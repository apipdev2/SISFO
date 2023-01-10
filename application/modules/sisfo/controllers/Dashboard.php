<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Dashboard',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/index',$data);
		$this->load->view('template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/sisfo/controllers/Dashboard.php */