<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanJadi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanJadi');
	}

	public function index()
	{
		$data = array(
			'bj' => $this->mBahanJadi->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/BahanJadi/vBahanJadi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/navbar');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/BahanJadi/vTambahBj');
			$this->load->view('Admin/Layouts/footer');
		} else {
			$config['upload_path']          = './asset/produk';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/Layouts/navbar');
				$this->load->view('Admin/Layouts/aside');
				$this->load->view('Admin/BahanJadi/vTambahBj');
				$this->load->view('Admin/Layouts/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'nama_bj' => $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi'),
					'keterangan' => $this->input->post('keterangan'),
					'stok' => $this->input->post('stok'),
					'harga' =>  $this->input->post('harga'),
					'gambar' => $upload_data['file_name']
				);
				$this->mBahanJadi->insert($data);
				$this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan!');
				redirect('Admin/cBahanJadi');
			}
		}
	}
}

/* End of file cBahanJadi.php */
