<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKatalog extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKatalog');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mKatalog->katalog()
		);
		$this->load->view('Reseller/Layouts/head');
		$this->load->view('Reseller/Layouts/navbar');
		$this->load->view('Reseller/Layouts/aside');
		$this->load->view('Reseller/vKatalog', $data);
		$this->load->view('Reseller/Layouts/footer');
	}
	public function addcart()
	{
		//potongan harga
		$harga = $this->input->post('harga');
		$qty = $this->input->post('qty');
		$stok = $this->input->post('stok');

		if ($qty > $stok) {
			$this->session->set_flashdata('error', 'Maaf STok Tidak Mencukupi, Silahkan Hubungi Kami Untuk Pembelian Diatas Atas Stok!');
			redirect('Reseller/cKatalog');
		} else {
			if ($qty >= 100) {
				$hrg = $harga - (0.05 * $harga);
			} else {
				$hrg = $harga;
			}
			$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'price' => $hrg,
				'qty' => $qty,
				'gambar' => $this->input->post('gambar'),
				'stok' => $this->input->post('stok')
			);
			$this->cart->insert($data);
			$this->session->set_flashdata('success', 'Produk berhasil masuk keranjang!');
			redirect('Reseller/cKatalog');
		}
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		$this->session->set_flashdata('success', 'Produk berhasil dihapus!');
		redirect('Reseller/cKatalog');
	}
	public function selesai()
	{
		$data = array(
			'id_reseller' => $this->session->userdata('id_reseller'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_pembayaran' => $this->cart->total(),
			'status' => '0',
			'payment' => '0',
			'alamat_pengiriman' => ''
		);
		$this->db->insert('transaksi_bj', $data);


		$id_transaksi = $this->db->query("SELECT MAX(id_tranbj) as id FROM `transaksi_bj`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$dt_detail = array(
				'id_tranbj' => $id_transaksi->id,
				'id_bj' => $value['id'],
				'qty_bj' => $value['qty']
			);
			$this->db->insert('detail_transaksibj', $dt_detail);
		}

		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Transaksi berhasil dikirim!');
		redirect('Reseller/cTransaksi');
	}
}

/* End of file cKatalog.php */
