<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPemesanan');
		$this->load->model('mBahanBaku');
		$this->load->model('mUser');
	}

	public function index()
	{
		$data = array(
			'pemesanan' => $this->mPemesanan->select_pemesanan()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Pemesanan/vPemesanan', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('bb', 'Bahan Baku', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'bb' => $this->mBahanBaku->select(),
				'user' => $this->mUser->select()
			);
			$this->load->view('Gudang/Layouts/head');
			$this->load->view('Gudang/Layouts/navbar');
			$this->load->view('Gudang/Layouts/aside');
			$this->load->view('Gudang/Pemesanan/vTambahPemesanan', $data);
			$this->load->view('Gudang/Layouts/footer');
		} else {
			$data = array(
				'id' => $this->input->post('bb'),
				'name' => $this->input->post('nama'),
				'price' => $this->input->post('harga'),
				'qty' => $this->input->post('qty'),
				'stok' => $this->input->post('stok'),
			);
			$this->cart->insert($data);
			$this->session->set_flashdata('success', 'Bahan Baku berhasil ditambahkan di keranjang');
			redirect('Gudang/cPemesanan/create');
		}
	}
	public function delete($id)
	{
		$this->cart->remove($id);
		$this->session->set_flashdata('success', 'Bahan Baku berhasil dihapus');
		redirect('Gudang/cPemesanan/create');
	}
	public function pesan()
	{
		//menyimpan data transaksi
		$dt_transaksi = array(
			'id_user' => $this->input->post('supplier'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_pembayaran' => $this->cart->total(),
			'status' => '0',
			'pembayaran' => '0',
			'bukti_bayar' => '0'
		);
		$this->mPemesanan->insert_pemesanan($dt_transaksi);

		//menyimpan data detail transaksi
		$id_pemesanan = $this->db->query("SELECT MAX(id_tranbb) as id FROM `transaksi_bb`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$dt_detail = array(
				'id_tranbb' => $id_pemesanan->id,
				'id_bb' => $value['id'],
				'qty_bb' => $value['qty']
			);
			$this->mPemesanan->insert_detail($dt_detail);
		}
		$this->session->set_flashdata('success', 'Pesanan berhasil dikirim!');
		redirect('Gudang/cPemesanan');
	}
	public function bayar($id)
	{
		$config['upload_path']          = './asset/bayar-bb';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'pemesanan' => $this->mPemesanan->select_pemesanan()
			);
			$this->load->view('Gudang/Layouts/head');
			$this->load->view('Gudang/Layouts/navbar');
			$this->load->view('Gudang/Layouts/aside');
			$this->load->view('Gudang/Pemesanan/vPemesanan', $data);
			$this->load->view('Gudang/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(

				'bukti_bayar' => $upload_data['file_name'],
				'status' => '1',
				'pembayaran' => '1'
			);
			$this->mPemesanan->update_status($id, $data);
			$this->session->set_flashdata('success', 'Pembayaran berhasil dikirim!');
			redirect('Gudang/cPemesanan');
		}
	}
}

/* End of file cPemesanan.php */
