<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel_model extends CI_Model {

	public function getRombel()
	{
		return $this->db->get('tbl_kelas');
	}

	public function getRombelById($id_kelas)
	{
		return $this->db->get_where('tbl_kelas',['id_kelas'=>$id_kelas]);
	}

}

/* End of file Rombel_model.php */
/* Location: ./application/modules/sisfo/models/Rombel_model.php */