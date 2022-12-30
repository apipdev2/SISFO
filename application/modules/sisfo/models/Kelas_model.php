<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function getKelas()
	{
		return $this->db->get('tbl_kelas');
	}

	public function addKelas($data)
	{
		return $this->db->insert('tbl_kelas',$data);
	}

	public function editKelas($data,$id)
	{	
		$this->db->where('id',$id);
		return $this->db->update('tbl_kelas',$data);
	}

	public function hapusKelas($id)
	{	
		$this->db->where('id',$id);
		return $this->db->delete('tbl_kelas');
	}	

}

/* End of file Jurusan_model.php */
/* Location: ./application/modules/sisfo/models/Jurusan_model.php */