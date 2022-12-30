<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenaikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Kelas_model','kelas');
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		
	}

	public function index()
	{	
		if ($this->input->post('id_kelas')) {

			$siswa = $this->riwayatkelas->getSiswaByIdKelas($this->input->post('id_kelas'))->result();

		}else{
			$siswa = [];
		}

		$data = [
			'title' => 'Kenaikan Kelas',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'ta' => $this->db->get('tahunajaran')->result(),
			'kelas' => $this->kelas->getKelas()->result(),
			'kelas_baru' => $this->kelas->getKelas()->result(),
			'siswa' => $siswa,
		];

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('sisfo/kenaikan/index',$data);
		$this->load->view('template/footer');
	}

	public function naik()
	{	
		$id_siswa = $this->input->post('id_siswa');
		$id_tahun = $this->input->post('id_tahun');
		$id_kelas = $this->input->post('id_kelas');

		for ($i=0; $i < count($id_siswa) ; $i++) { 
			
			$data[$i] = [
				'id_tahun' => $id_tahun,
				'id_siswa' => $id_siswa[$i],
				'id_kelas' => $id_kelas,
				'status_siswa' => 'Y',
			];

			$cek = $this->db->get_where('riwayatkelas',['id_tahun' => $id_tahun,'id_siswa' => $id_siswa[$i]])->num_rows();

			if ($cek > 0) {

				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Sudah ada!', 'info');</script>");

			}else{

				$query = $this->db->insert('riwayatkelas',$data[$i]);
			}

			//update flag
			// $this->db->where('id_siswa',$id_siswa[$i])->update('riwayatkelas',['flag' => 'Naik Kelas'])
		}

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Kenaikan');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kenaikan');
		}
	}

}

/* End of file Kenaikan.php */
/* Location: ./application/modules/sisfo/controllers/Kenaikan.php */