<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPemesanan');
	}

	public function index()
	{
		$data = array(
			'pemesanan' => $this->mPemesanan->pemesanan(4)
		);
		$this->load->view('Supplier/Layouts/head');
		$this->load->view('Supplier/Layouts/navbar');
		$this->load->view('Supplier/Layouts/aside');
		$this->load->view('Supplier/vPemesanan', $data);
		$this->load->view('Supplier/Layouts/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'status' => '2'
		);
		$this->mPemesanan->update_status($id, $data);
		$this->session->set_flashdata('success', 'Pemesanan berhasil dikonfirmasi!');
		redirect('Supplier/cPemesanan');
	}
}

/* End of file cPemesanan.php */
