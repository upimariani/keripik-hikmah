<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBbKeluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBbKeluar');
		$this->load->model('mBahanBaku');
		$this->load->model('mUser');
	}

	public function index()
	{
		$data = array(
			'bb_keluar' => $this->mBbKeluar->select(),
			'bb' => $this->mBahanBaku->select(),
			'supplier' => $this->mUser->select()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/BbKeluar/vBbKeluar', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function get_bahanbaku()
	{
		$id_supplier = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM `bahan_baku` WHERE nm_supplier='" . $id_supplier . "'")->result();
		echo json_encode($data);
	}
	public function create()
	{
		$qty_tersedia = $this->input->post('qty_tersedia');
		$qty = $this->input->post('qty');
		if ($qty > $qty_tersedia) {
			$this->session->set_flashdata('error', 'Mohon maaf stok tidak cukup! Silahkan melakukan pemesanan bahan baku kepada supplier.');
			redirect('Gudang/cBbKeluar', 'refresh');
		} else {
			$data = array(
				'id_bb' => $this->input->post('bb'),
				'tgl_keluar' => $this->input->post('date'),
				'qty_keluar' => $this->input->post('qty')
			);
			$this->mBbKeluar->insert($data);

			//mengurangi stok bahan baku
			$id_bb = $data['id_bb'];
			$bb = $this->db->query("SELECT * FROM `bahan_baku` WHERE id_bb='" . $id_bb . "'")->row();
			$dt_stok = array(
				'stok' => $bb->stok - $data['qty_keluar']
			);
			$this->db->where('id_bb', $id_bb);
			$this->db->update('bahan_baku', $dt_stok);


			$this->session->set_flashdata('success', 'Bahan baku keluar berhasil disimpan!');
			redirect('Gudang/cBbKeluar');
		}
	}
	public function update($id)
	{
		$data = array(
			'id_bb' => $this->input->post('bb'),
			'tgl_keluar' => $this->input->post('date'),
			'qty_keluar' => $this->input->post('qty')
		);
		$this->mBbKeluar->update($id, $data);
		$this->session->set_flashdata('success', 'Bahan baku keluar berhasil diperbaharui!');
		redirect('Gudang/cBbKeluar');
	}
	public function delete($id)
	{
		$this->mBbKeluar->delete($id);
		$this->session->set_flashdata('success', 'Bahan baku keluar berhasil dihapus!');
		redirect('Gudang/cBbKeluar');
	}
}

/* End of file cBbKeluar.php */
