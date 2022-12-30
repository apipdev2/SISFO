<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_didik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		
	}

	public function index()
	{
		$data= [
			'title' => 'Data Peserta Didik',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'siswa' => $this->riwayatkelas->getSiswa()->result(),
		];

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('sisfo/peserta_didik/index',$data);
		$this->load->view('template/footer');
	}

}

/* End of file Riwayatkelas.php */
/* Location: ./application/modules/sisfo/controllers/Riwataykelas.php */