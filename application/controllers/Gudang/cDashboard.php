<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChat');
	}

	public function index()
	{
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/vDashboard');
		$this->load->view('Gudang/Layouts/footer');
	}
	public function chat($id)
	{
		$data = array(
			'chat' => $this->mChat->chat_gudang($id),
			'id_reseller' => $id
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/vChat', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function send($id)
	{
		$data = array(
			'id_user' => '2',
			'id_reseller' => $id,
			'gudang_send' => $this->input->post('message')
		);
		$this->db->insert('chat', $data);
		$this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
		redirect('Gudang/cDashboard/chat/' . $id);
	}
}

/* End of file cDashboard.php */
