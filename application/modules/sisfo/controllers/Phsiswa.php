<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phsiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		is_login();
		// cek_admin();
	}

	public function index()
	{	

		$data = [
			'title' => 'Data Presensi Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/phsiswa/index',$data);
		$this->load->view('template/footer');
	}

	public function ajax_getPh()
	{
		$id_kelas =  $this->input->post('id_kelas');
		$bln = $this->input->post('bln');
		$thn = $this->input->post('thn');
		$siswa = $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result();
		
		foreach ($siswa as $row) {
			$data[] = [
				'nis' => $row->nis,
				'nama_peserta' => $row->nama_peserta,
				'jenis_kelamin' => $row->jenis_kelamin,
				'H'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','H')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'I'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','I')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'S'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','S')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'A'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','A')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),
			];
		}

		
		echo json_encode($data);

	}

	public function addPh($id_kelas)
	{
		$data = [
			'title' => 'Tambah Presensi Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'siswa' => $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/phsiswa/add_phsiswa',$data);
		$this->load->view('template/footer');
	}

	public function storephsiswa()
	{
		$nis = $this->input->post('nis');
		$ket = $this->input->post('ket');
		
		for ($i=0; $i < count($nis	) ; $i++) { 
			
			$data[$i] = [
				'id_tahun' => $this->session->userdata('id_tahun'),
				'tanggal' => $this->input->post('tanggal'),
				'nis' => $nis[$i],
				'ket' => $ket[$i],
				'type' => 'M',
			];

		$cek = $this->db->get_where('phsiswa',[
				'tanggal' => $this->input->post('tanggal'),
				'nis' => $nis[$i],])->num_rows();

			if ($cek < 1) {
				$query = $this->db->insert('phsiswa',$data[$i]);
			}
		}
		
		// if ($query) {
		// 	$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil disimpan!', 'success');</script>");
  //       	redirect('sisfo/Phsiswa');
		// }else{
		// 	$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal disimpan!', 'error');</script>");
  //       	redirect('sisfo/Phsiswa');
		// }
	}

}

/* End of file Phsiswa.php */
/* Location: ./application/modules/sisfo/controllers/Phsiswa.php */