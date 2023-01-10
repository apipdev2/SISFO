<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{	
		$data=['title'=>'Dashboard'];

		$this->load->view('infoguru/template/header');
		$this->load->view('infoguru/template/navbar');
		$this->load->view('infoguru/index',$data);
		$this->load->view('infoguru/template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/infoguru/controllers/Dashboard.php */