<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function index()
	{
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Transaksi/vTransaksi');
		$this->load->view('Gudang/Layouts/footer');
	}
}

/* End of file cTransaksi.php */
