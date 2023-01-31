<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Rombel_model','rombel');
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		is_login();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Data Rombel',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'rombel' => $this->rombel->getRombel()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/rombel/index',$data);
		$this->load->view('template/footer');
	}

	public function view($id_kelas)
	{
		$id_kelas = decrypt_url($id_kelas);

		$data= [
			'title' => 'View Rombel',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'pd' => $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result(),
			'kelas' => $this->db->get_where('tbl_kelas',['id_kelas' => $id_kelas])->row(),
			'siswa' => $this->rombel->getSiswa()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/rombel/view',$data);
		$this->load->view('template/footer');
	}

	public function addPeserta()
	{	
		$id_kelas = $this->input->post('id_kelas');
		$nis =  $this->input->post('nis');

		for ($i=0; $i < count($nis); $i++) { 

			$data[$i] = [
				'id_tahun' => $this->session->userdata('id_tahun'),
				'nis' => $nis[$i],
				'id_kelas' => $id_kelas,
				'status_siswa' => 'Y',
			];

			$query = $this->riwayatkelas->insertSiswa($data[$i]);
			//update flag siswa
			$this->db->where('nis', $nis[$i])->update('siswa',['flag'=>'1']);

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

			//update flag siswa
			$riwayat = $this->db->get_where('riwayatkelas',['id_riwayat'=>$id])->row();
			$this->db->where('nis', $riwayat->nis)->update('siswa',['flag'=>'0']);
			//delete
			$query = $this->riwayatkelas->hapusSiswa($id);
			


		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus!', 'error');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
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

        

        $kelas = array();
        foreach ($sheetData as $rows) {        	
        	$kls['id_tahun'] = $this->session->userdata('id_tahun');
        	$kls['nis'] = $rows[1];
        	$kls['id_kelas'] = $this->input->post('id_kelas');
        	$kls['status_siswa'] = "Y";
        	$kls['flag'] = 0;
        	$kelas[] = $kls;
        }


        $import_siswa = $this->db->insert_batch('siswa',$data);
        $query = $this->db->insert_batch('riwayatkelas',$kelas);
        
        
        if ($query) {
		$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Import data!', 'success');</script>");
    	redirect('sisfo/Rombel');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Import data!', 'error');</script>");
        	redirect('sisfo/Rombel');
		}

      }


	}


    public function active($nis)
    {
        $this->db->where('nis',$nis);
        $this->db->update('riwayatkelas',['status_siswa'=>'Y']);

        $result = ['message'=>'success'];
        echo json_encode($result);
    }

     public function non_active($nis)
    {
        $this->db->where('nis',$nis);
        $this->db->update('riwayatkelas',['status_siswa'=>'N']);

        $result = ['message'=>'success'];
        echo json_encode($result);
    }

    public function mutasi()
    {

        $data =[
            'id_tahun' => $this->session->userdata('id_tahun'),
            'tanggal'  => date('Y-m-d'),
            'nis'      => $this->input->post('nis'),
            'sekolah_tujuan' => $this->input->post('sekolah_tujuan'),
            'ket' => $this->input->post('ket'),
            'jenis_mutasi' => 'keluar',
            'alasan' => $this->input->post('alasan'),
        ];

        $query = $this->db->insert('mutasi',$data);
        $this->db->where('nis',$this->input->post('nis'));
        $this->db->update('riwayatkelas',['status_siswa'=>'N']);

        if ($query) {
        $this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Save data!', 'success');</script>");
        redirect('sisfo/Rombel');
        }else{
            $this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Save data!', 'error');</script>");
            redirect('sisfo/Rombel');
        }
    }

	

}



/* End of file Rombel.php */
/* Location: ./application/modules/sisfo/controllers/Rombel.php */