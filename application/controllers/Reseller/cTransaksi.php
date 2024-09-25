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
			'transaksi' => $this->mTransaksi->select($this->session->userdata('id_reseller'))
		);
		$this->load->view('Reseller/Layouts/head');
		$this->load->view('Reseller/Layouts/navbar');
		$this->load->view('Reseller/Layouts/aside');
		$this->load->view('Reseller/vTransaksi', $data);
		$this->load->view('Reseller/Layouts/footer');
	}
	public function bayar($id)
	{
		$config['upload_path']          = './asset/bayar-bj';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'transaksi' => $this->mTransaksi->select($this->session->userdata('id_reseller'))
			);
			$this->load->view('Reseller/Layouts/head');
			$this->load->view('Reseller/Layouts/navbar');
			$this->load->view('Reseller/Layouts/aside');
			$this->load->view('Reseller/vTransaksi', $data);
			$this->load->view('Reseller/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(

				'payment' => $upload_data['file_name'],
				'status' => '1'
			);
			$this->mTransaksi->update_status($id, $data);
			$this->session->set_flashdata('success', 'Pembayaran berhasil dikirim!');
			redirect('Reseller/cTransaksi');
		}
	}
	public function pesanan_diterima($id)
	{
		$data = array(
			'status' => '3'
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Pesanan berhasil diterima!');
		redirect('Reseller/cTransaksi');
	}
}

/* End of file cTransaksi.php */
