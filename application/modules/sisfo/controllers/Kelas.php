<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Kelas_model','kelas');
		
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Kelas',
			'kelas' => $this->kelas->getKelas()->result(),
		];

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('sisfo/kelas/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = [
			'tingkat' 		=> $this->input->post('tingkat'),
			'kelas' 		=> $this->input->post('kelas'),
		];

		$query = $this->kelas->addKelas($data);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Kelas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kelas');
		}
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data = [
			'tingkat' 		=> $this->input->post('tingkat'),
			'kelas' 		=> $this->input->post('kelas'),
		];

		$query = $this->kelas->editKelas($data,$id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil diubah!', 'success');</script>");
        	redirect('sisfo/Kelas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal diubah!', 'error');</script>");
        	redirect('sisfo/Kelas');
		}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);
		
		$query = $this->kelas->hapusKelas($id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
        	redirect('sisfo/Kelas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
        	redirect('sisfo/Kelas');
		}
	}

}

/* End of file Kelas.php */
/* Location: ./application/modules/sisfo/controllers/Kelas.php */