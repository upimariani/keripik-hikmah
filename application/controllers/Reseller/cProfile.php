<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfile extends CI_Controller
{

	public function index()
	{
		$this->load->view('Reseller/Layouts/head');
		$this->load->view('Reseller/Layouts/navbar');
		$this->load->view('Reseller/Layouts/aside');
		$this->load->view('Reseller/vProfile');
		$this->load->view('Reseller/Layouts/footer');
	}
}

/* End of file cProfile.php */
