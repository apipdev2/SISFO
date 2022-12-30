<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Pegawai_model','pegawai');
		
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Pegawai',
			'pegawai' => $this->pegawai->getPegawai()->result(),
		];

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('sisfo/pegawai/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{	
		$data = [
			'title' => 'Tambah Pegawai',
		];

		$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[1]|max_length[16]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
		if ($this->form_validation->run()== FALSE) {

			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('sisfo/pegawai/tambah_pegawai',$data);
			$this->load->view('template/footer');
		}else{

			$data = [
				'nip'				=> $this->input->post('nip'),
				'nik'				=> $this->input->post('nik'),
				'no_kk'				=> $this->input->post('no_kk'),
				'nama_lengkap'		=> $this->input->post('nama_lengkap'),
				'gelar_depan'		=> $this->input->post('gelar_depan'),
				'gelar_belakang'	=> $this->input->post('gelar_belakang'),
				'pendidikan_terakhir'=> $this->input->post('pendidikan_terakhir'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'tempat_lahir'		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
				'alamat'			=> $this->input->post('alamat'),
				'telp'				=> $this->input->post('telp'),
				'email'				=> $this->input->post('email'),
				'status_pegawai'	=> $this->input->post('status_pegawai'),
			];

			$query = $this->pegawai->insertPegawai($data);
			if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Pegawai');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('sisfo/Pegawai');
			}
		}

		
	}

	public function edit($id)
	{	
		$id = decrypt_url($id);
		$data = [
			'title' => 'Edit Pegawai',
			'pegawai' => $this->pegawai->getPegawaiById($id)->row(),
			'jenis_kelamin' => ['Laki-laki','Perempuan'],
			'status_pegawai' => ['guru','tendik'],
		];
		
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('sisfo/pegawai/edit_pegawai',$data);
		$this->load->view('template/footer');		

	}

	public function update($id)
	{
		$id = decrypt_url($id);
		$data = [
				'nip'				=> $this->input->post('nip'),
				'nik'				=> $this->input->post('nik'),
				'no_kk'				=> $this->input->post('no_kk'),
				'nama_lengkap'		=> $this->input->post('nama_lengkap'),
				'gelar_depan'		=> $this->input->post('gelar_depan'),
				'gelar_belakang'	=> $this->input->post('gelar_belakang'),
				'pendidikan_terakhir'=> $this->input->post('pendidikan_terakhir'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'tempat_lahir'		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
				'alamat'			=> $this->input->post('alamat'),
				'telp'				=> $this->input->post('telp'),
				'email'				=> $this->input->post('email'),
				'status_pegawai'	=> $this->input->post('status_pegawai'),
			];

			$query = $this->pegawai->editPegawai($data,$id);
			if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terupdate!', 'success');</script>");
        		redirect('sisfo/Pegawai');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terupdate!', 'error');</script>");
	        	redirect('sisfo/Pegawai');
			}
	}

	public function hapus($id)
	{	
		$id = decrypt_url($id);
		$query = $this->pegawai->hapusPegawai($id);
			if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        		redirect('sisfo/Pegawai');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus!', 'error');</script>");
	        	redirect('sisfo/Pegawai');
			}
	}

}

/* End of file Pegawai.php */
/* Location: ./application/modules/sisfo/controllers/Pegawai.php */