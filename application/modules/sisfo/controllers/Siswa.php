<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Siswa_model','siswa');
		$this->load->model('sisfo/Jurusan_model','jurusan');
		is_login();
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'siswa' => $this->siswa->getSiswa()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/siswa/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{	
		$data =[
			'title' 	=> 'Tambah Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),			
			'jurusan'	=> $this->jurusan->getJurusan()->result(),
			'agama'		=> $this->db->get('tbl_agama')->result(),
			'kebutuhan'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'kebutuhan_ayah'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'kebutuhan_ibu'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'pendidikan_ayah'	=> $this->db->get('tbl_pendidikan')->result(),
			'pendidikan_ibu'	=> $this->db->get('tbl_pendidikan')->result(),
			'pendidikan_wali'	=> $this->db->get('tbl_pendidikan')->result(),
			'pekerjaan'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan'	=> $this->db->get('tbl_penghasilan')->result(),
			'pekerjaan_ibu'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan_ibu'	=> $this->db->get('tbl_penghasilan')->result(),
			'pekerjaan_wali'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan_wali'	=> $this->db->get('tbl_penghasilan')->result(),
			'transportasi'	=> $this->db->get('transportasi')->result(),
			'size_jurusan' => ['M','L','XL','XXL','XXL'],
			'size_olahraga' => ['M','L','XL','XXL','XXL'],
		];

		$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[1]|max_length[16]');
		$this->form_validation->set_rules('nama_peserta', 'Nama', 'required');

		if ($this->form_validation->run()== FALSE) {

			$this->load->view('template/header',$data);
			$this->load->view('template/navbar');
			$this->load->view('sisfo/siswa/tambah_siswa',$data);
			$this->load->view('template/footer');
		}else{

			$data =[
				'id_tahun' 		 => $this->session->userdata('id_tahun'),
				'nik' 			 => $this->input->post('nik'),
				'nama_peserta'   => $this->input->post('nama_peserta'),
				'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
				'nisn' 			 => $this->input->post('nisn'),				
				'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
				'no_registrasi_akta_lahir' => $this->input->post('no_registrasi_akta_lahir'),
				'agama' => $this->input->post('agama'),
				'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus'),
				'alamat' => $this->input->post('alamat'),
				'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				'moda_transportasi' => $this->input->post('moda_transportasi'),
				'anak_ke' => $this->input->post('anak_ke'),
				'no_kip' => $this->input->post('no_kip'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nik_ayah' => $this->input->post('nik_ayah'),
				'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah'),
				'tanggal_lahir_ayah' => $this->input->post('tanggal_lahir_ayah'),
				'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
				'penghasilan_bulanan_ayah' => $this->input->post('penghasilan_bulanan_ayah'),
				'berkebutuhan_khusus_ayah' => $this->input->post('berkebutuhan_khusus_ayah'),
				'no_ayah' => $this->input->post('no_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'nik_ibu' => $this->input->post('nik_ibu'),
				'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu'),
				'tanggal_lahir_ibu' => $this->input->post('tanggal_lahir_ibu'),
				'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
				'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
				'penghasilan_bulanan_ibu' => $this->input->post('penghasilan_bulanan_ibu'),
				'berkebutuhan_khusus_ibu' => $this->input->post('berkebutuhan_khusus_ibu'),
				'no_ibu' => $this->input->post('no_ibu'),
				'nama_wali' => $this->input->post('nama_wali'),
				'nik_wali' => $this->input->post('nik_wali'),
				'tempat_lahir_wali' => $this->input->post('tempat_lahir_wali'),
				'pendidikan_wali' => $this->input->post('pendidikan_wali'),
				'pekerjaan_wali' => $this->input->post('pekerjaan_wali'),
				'tanggal_lahir_wali' => $this->input->post('tanggal_lahir_wali'),
				'penghasilan_bulanan_wali' => $this->input->post('penghasilan_bulanan_wali'),
				'no_wali' => $this->input->post('no_wali'),
				'nomor_hp' => $this->input->post('nomor_hp'),
				'email' => $this->input->post('email'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'berat_badan' => $this->input->post('berat_badan'),
				'jarak' => $this->input->post('jarak'),
				'jumlah_saudara_kandung' => $this->input->post('jumlah_saudara_kandung'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'no_kk	' => $this->input->post('no_kk'),			
				'status' =>"Y",
				'id_users' => $this->session->userdata('id_user'),				
				'image' => 'default.jpg',
				'size_jurusan' => $this->input->post('size_jurusan'),
				'size_olahraga' => $this->input->post('size_olahraga'),
			];

			$query = $this->siswa->insertSiswa($data);
			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('sisfo/Siswa');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('sisfo/Siswa');
			}
		}
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data =[
			'title' => 'Edit Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'siswa'	=> $this->siswa->getSiswaById($id)->row(),
			'jurusan'	=> $this->jurusan->getJurusan()->result(),
			'agama'		=> $this->db->get('tbl_agama')->result(),
			'kebutuhan'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'kebutuhan_ayah'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'kebutuhan_ibu'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'pendidikan_ayah'	=> $this->db->get('tbl_pendidikan')->result(),
			'pendidikan_ibu'	=> $this->db->get('tbl_pendidikan')->result(),
			'pendidikan_wali'	=> $this->db->get('tbl_pendidikan')->result(),
			'pekerjaan'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan'	=> $this->db->get('tbl_penghasilan')->result(),
			'pekerjaan_ibu'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan_ibu'	=> $this->db->get('tbl_penghasilan')->result(),
			'pekerjaan_wali'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan_wali'	=> $this->db->get('tbl_penghasilan')->result(),
			'transportasi'	=> $this->db->get('transportasi')->result(),
			'jenis_kelamin' => ['L','P'],
			'tempat_tinggal' => ['Bersama Orang Tua','Wali','Kos','Asrama','Panti Asuhan'],
			'jarak' => ['Kurang Dari 1 KM', 'Lebih Dari 1 KM'],
			'size_jurusan' => ['M','L','XL','XXL','XXL'],
			'size_olahraga' => ['M','L','XL','XXL','XXL'],
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/siswa/edit_siswa',$data);
		$this->load->view('template/footer');

	}

	public function update($id)
	{
		$id = decrypt_url($id);
		$data =[
				'nik' 			 => $this->input->post('nik'),
				'nama_peserta'   => $this->input->post('nama_peserta'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'nisn' => $this->input->post('nisn'),				
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'no_registrasi_akta_lahir' => $this->input->post('no_registrasi_akta_lahir'),
				'agama' => $this->input->post('agama'),
				'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus'),
				'alamat' => $this->input->post('alamat'),
				'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				'moda_transportasi' => $this->input->post('moda_transportasi'),
				'anak_ke' => $this->input->post('anak_ke'),
				'no_kip' => $this->input->post('no_kip'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nik_ayah' => $this->input->post('nik_ayah'),
				'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah'),
				'tanggal_lahir_ayah' => $this->input->post('tanggal_lahir_ayah'),
				'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
				'penghasilan_bulanan_ayah' => $this->input->post('penghasilan_bulanan_ayah'),
				'berkebutuhan_khusus_ayah' => $this->input->post('berkebutuhan_khusus_ayah'),
				'no_ayah' => $this->input->post('no_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'nik_ibu' => $this->input->post('nik_ibu'),
				'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu'),
				'tanggal_lahir_ibu' => $this->input->post('tanggal_lahir_ibu'),
				'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
				'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
				'penghasilan_bulanan_ibu' => $this->input->post('penghasilan_bulanan_ibu'),
				'berkebutuhan_khusus_ibu' => $this->input->post('berkebutuhan_khusus_ibu'),
				'no_ibu' => $this->input->post('no_ibu'),
				'nama_wali' => $this->input->post('nama_wali'),
				'nik_wali' => $this->input->post('nik_wali'),
				'tempat_lahir_wali' => $this->input->post('tempat_lahir_wali'),
				'pendidikan_wali' => $this->input->post('pendidikan_wali'),
				'pekerjaan_wali' => $this->input->post('pekerjaan_wali'),
				'tanggal_lahir_wali' => $this->input->post('tanggal_lahir_wali'),
				'penghasilan_bulanan_wali' => $this->input->post('penghasilan_bulanan_wali'),
				'no_wali' => $this->input->post('no_wali'),
				'nomor_hp' => $this->input->post('nomor_hp'),
				'email' => $this->input->post('email'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'berat_badan' => $this->input->post('berat_badan'),
				'jarak' => $this->input->post('jarak'),
				'jumlah_saudara_kandung' => $this->input->post('jumlah_saudara_kandung'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'no_kk	' => $this->input->post('no_kk'),
			];		


			$query = $this->siswa->updateSiswa($data,$id);
			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terupdate!', 'success');</script>");
	        	redirect('sisfo/Siswa');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terupdate!', 'error');</script>");
	        	redirect('sisfo/Siswa');
			}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);

		$query = $this->siswa->hapusSiswa($id);
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        	redirect('sisfo/Siswa');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus', 'error');</script>");
        	redirect('sisfo/Siswa');
		}
	}

}

/* End of file Siswa.php */
/* Location: ./application/modules/sisfo/controllers/Siswa.php */