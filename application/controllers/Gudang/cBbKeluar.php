<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBbKeluar extends CI_Controller
{

	public function index()
	{
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/BbKeluar/vBbKeluar');
		$this->load->view('Gudang/Layouts/footer');
	}
}

/* End of file cBbKeluar.php */
