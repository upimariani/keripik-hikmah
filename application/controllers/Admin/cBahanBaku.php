<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBaku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanBaku');
	}

	public function index()
	{
		$data = array(
			'bb' => $this->mBahanBaku->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/BahanBaku/vBahanBaku', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/navbar');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/BahanBaku/vTambahBB');
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'nama_bb' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'nm_supplier' => $this->input->post('supplier')
			);
			$this->mBahanBaku->insert($data);
			$this->session->set_flashdata('success', 'Data Bahan Baku berhasil disimpan!');
			redirect('Admin/cBahanBaku');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'bb' => $this->mBahanBaku->get_data($id)
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/navbar');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/BahanBaku/vPerbaharuiBB', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'nama_bb' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'nm_supplier' => $this->input->post('supplier')
			);
			$this->mBahanBaku->update($id, $data);
			$this->session->set_flashdata('success', 'Data Bahan Baku berhasil diperbaharui!');
			redirect('Admin/cBahanBaku');
		}
	}
	public function delete($id)
	{
		$this->mBahanBaku->delete($id);
		$this->session->set_flashdata('success', 'Data Bahan Baku berhasil dihapus!');
		redirect('Admin/cBahanBaku');
	}
}

/* End of file cBahanBaku.php */
