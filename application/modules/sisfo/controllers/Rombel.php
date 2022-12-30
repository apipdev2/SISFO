<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Rombel_model','rombel');
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		$this->load->model('sisfo/Siswa_model','siswa');
		
	}

	public function index()
	{
		$data= [
			'title' => 'Data Rombongan Belajar',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'rombel' => $this->rombel->getRombel()->result(),
		];

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('sisfo/rombel/index',$data);
		$this->load->view('template/footer');
	}

	public function view($id_kelas)
	{
		$id_kelas = decrypt_url($id_kelas);

		$data= [
			'title' => 'View Rombongan Belajar',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'pd' => $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result(),
			'kelas' => $this->db->get_where('tbl_kelas',['id_kelas' => $id_kelas])->row(),
			'siswa' => $this->siswa->getSiswa()->result(),
		];

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('sisfo/rombel/view',$data);
		$this->load->view('template/footer');
	}

	public function addPeserta()
	{	
		$id_kelas = $this->input->post('id_kelas');
		$id_siswa =  $this->input->post('id_siswa');

		for ($i=0; $i < count($id_siswa); $i++) { 

			$data[$i] = [
				'id_tahun' => $this->session->userdata('id_tahun'),
				'id_siswa' => $id_siswa[$i],
				'id_kelas' => $id_kelas,
				'status_siswa' => 'Y',
			];

			$query = $this->riwayatkelas->insertSiswa($data[$i]);

		}
		
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}
	}

	public function hapusPeserta($id,$id_kelas)
	{	
		$id_kelas = decrypt_url($id_kelas);
		$id = decrypt_url($id);

		$query = $this->riwayatkelas->hapusSiswa($id);
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus!', 'error');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}
	}

}

/* End of file Rombel.php */
/* Location: ./application/modules/sisfo/controllers/Rombel.php */