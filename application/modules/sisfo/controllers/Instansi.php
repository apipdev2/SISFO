<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		cek_admin();
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Instansi',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/instansi/index',$data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$data = [
			'npsn' => $this->input->post('npsn'),
			'nama_sekolah' => $this->input->post('nama_sekolah'),
			'jenjang' => $this->input->post('jenjang'),
			'status' => $this->input->post('status'),
			'alamat' => $this->input->post('alamat'),
			'kepala_sekolah' => $this->input->post('kepala_sekolah'),
			'no_telepon' => $this->input->post('no_telepon'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
		];

		$query = $this->db->insert('identitas',$data);
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data berhasil diubah!', 'success');</script>");
        	redirect('sisfo/Instansi');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data gagal diubah!', 'error');</script>");
        	redirect('sisfo/Instansi');
		}
	}

	

}

/* End of file Instansi.php */
/* Location: ./application/modules/sisfo/controllers/Instansi.php */