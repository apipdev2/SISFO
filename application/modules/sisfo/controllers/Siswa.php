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
			'jenis_registrasi' => ['Siswa baru', 'Pindahan']
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
				'tanggal_daftar' => date('Y-m-d'),
				'jenis_registrasi' => $this->input->post('jenis_registrasi'),
				'nis' 			 => $this->input->post('nis'),
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
			if ($this->input->post('jenis_registrasi') == 'Pindahan') {
				$data =[
		            'id_tahun' => $this->session->userdata('id_tahun'),
		            'tanggal'  => date('Y-m-d'),
		            'nis'      => $this->input->post('nis'),
		            'sekolah_asal' => $this->input->post('asal_sekolah'),
		            'jenis_mutasi' => 'masuk',
		            'ket' => 'Pindahan',
		        ];

		        $this->db->insert('mutasi',$data);
			}

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
			'jenis_registrasi' => ['Siswa baru', 'Pindahan']
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
				'jenis_registrasi' => $this->input->post('jenis_registrasi'),
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

	public function import(){
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['upload_file']['name']);
        $extension = end($arr_file);
        if('csv' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }elseif('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetData = $spreadsheet->getSheet(0)->toArray();
        unset($sheetData[0]);
        $data = array();

        foreach ($sheetData as $row) {
        	$datas['id_tahun'] = $this->session->userdata('id_tahun');
        	$datas['nis'] = $row[1];
        	$datas['nisn'] = $row[2];
        	$datas['nik'] = $row[3];
        	$datas['no_kk'] = $row[4];
        	$datas['nama_peserta'] = $row[5];
        	$datas['tempat_lahir'] = $row[6];
        	$datas['tanggal_lahir'] = $row[7];
        	$datas['jenis_kelamin'] = $row[8];
        	$datas['asal_sekolah'] = $row[9];
        	$datas['no_registrasi_akta_lahir'] = $row[10];
        	$datas['agama'] = $row[11];
        	$datas['berkebutuhan_khusus'] = $row[12];
        	$datas['alamat'] = $row[13];
        	$datas['rt'] = $row[14];
        	$datas['rw'] = $row[15];
        	$datas['desa'] = $row[16];
        	$datas['kecamatan'] = $row[17];
        	$datas['kabupaten'] = $row[18];
        	$datas['prov'] = $row[19];
        	$datas['tempat_tinggal'] = $row[20];
        	$datas['moda_transportasi'] = $row[21];
        	$datas['anak_ke'] = $row[22];
        	$datas['jumlah_saudara_kandung'] = $row[23];
        	$datas['nomor_hp'] = $row[24];
        	$datas['email'] = $row[25];
        	$datas['tinggi_badan'] = $row[26];
        	$datas['berat_badan'] = $row[27];
        	$datas['jarak'] = $row[28];
        	$datas['size_jurusan'] = $row[29];
        	$datas['size_olahraga'] = $row[30];
        	$datas['nama_ayah'] = $row[31];
        	$datas['nik_ayah'] = $row[32];
        	$datas['tempat_lahir_ayah'] = $row[33];
        	$datas['tanggal_lahir_ayah'] = $row[34];
        	$datas['pendidikan_ayah'] = $row[35];
        	$datas['pekerjaan_ayah'] = $row[36];
        	$datas['penghasilan_bulanan_ayah'] = $row[37];
        	$datas['berkebutuhan_khusus_ayah'] = $row[38];
        	$datas['no_ayah'] = $row[39];
        	$datas['nik_ibu'] = $row[40];
        	$datas['nama_ibu'] = $row[41];
        	$datas['tempat_lahir_ibu'] = $row[42];
        	$datas['tanggal_lahir_ibu'] = $row[43];
        	$datas['pendidikan_ibu'] = $row[44];
        	$datas['pekerjaan_ibu'] = $row[45];
        	$datas['penghasilan_bulanan_ibu'] = $row[46];
        	$datas['berkebutuhan_khusus_ibu'] = $row[47];
        	$datas['no_ibu'] = $row[48];
        	$datas['nama_wali'] = $row[49];
        	$datas['nik_wali'] = $row[50];
        	$datas['tempat_lahir_wali'] = $row[51];
        	$datas['tanggal_lahir_wali'] = $row[52];
        	$datas['penghasilan_bulanan_wali'] = $row[53];
        	$datas['no_wali'] = $row[54];
        	$data[] = $datas;
        }

        $query = $this->db->insert_batch('siswa',$data);
        if ($query) {
		$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Import data!', 'success');</script>");
    	redirect('sisfo/Siswa');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Import data!', 'error');</script>");
        	redirect('sisfo/Siswa');
		}

      }
	}

}

/* End of file Siswa.php */
/* Location: ./application/modules/sisfo/controllers/Siswa.php */