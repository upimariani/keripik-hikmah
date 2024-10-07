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
	public function delete($id)
	{
		$this->db->where('id_tranbj', $id);
		$this->db->delete('transaksi_bj');

		$this->db->where('id_tranbj', $id);
		$this->db->delete('detail_transaksibj');
		$this->session->set_flashdata('success', 'Pesanan dibatalkan!');
		redirect('Reseller/cTransaksi');
	}
	public function update($id)
	{
		$totals = 0;
		$no = 1;
		$dt_produk = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $id . "'")->result();
		foreach ($dt_produk as $key => $value) {
			$qty = $this->input->post('qty' . $no++);

			if ($qty >= 1000) {
				$hrg = $value->harga / 2;
			} else {
				$hrg = $value->harga;
			}
			$totals += ($qty * $hrg);


			$data = array(
				'qty_bj' => $qty

			);
			$this->db->where('id_detailbj', $value->id_detailbj);
			$this->db->update('detail_transaksibj', $data);
		}
		$dt_total_bayar = array(
			'total_pembayaran' => $totals
		);
		$this->db->where('id_tranbj', $id);
		$this->db->update('transaksi_bj', $dt_total_bayar);
		$this->session->set_flashdata('success', 'Pesanan diperbaharui!');
		redirect('Reseller/cTransaksi');
	}
}

/* End of file cTransaksi.php */
