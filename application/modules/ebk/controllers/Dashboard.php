<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{	
		$data=['title'=>'Dashboard'];

		$this->load->view('ebk/template/header');
		$this->load->view('ebk/template/navbar');
		$this->load->view('ebk/index',$data);
		$this->load->view('ebk/template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/ebk/controllers/Dashboard.php */