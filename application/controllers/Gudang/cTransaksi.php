<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Transaksi/vTransaksi', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'status' => '2'
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Transaksi reseller berhasil dikonfimasi! Silahkan kirim pesanan');
		redirect('Gudang/cTransaksi');
	}
}

/* End of file cTransaksi.php */
