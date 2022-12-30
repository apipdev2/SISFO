<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesiswaan extends CI_Controller {

	public function index()
	{	
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('kesiswaan/index');
		$this->load->view('template/footer');
	}

}

/* End of file Kesiswaan.php */
/* Location: ./application/modules/kesiswaan/controllers/Kesiswaan.php */