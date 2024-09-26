<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChat');
	}

	public function index()
	{
		$data = array(
			'chat' => $this->mChat->chat()
		);
		$this->load->view('Reseller/Layouts/head');
		$this->load->view('Reseller/Layouts/navbar');
		$this->load->view('Reseller/Layouts/aside');
		$this->load->view('Reseller/vProfile', $data);
		$this->load->view('Reseller/Layouts/footer');
	}
	public function chat($id)
	{
		$data = array(
			'id_user' => '2',
			'id_reseller' => $id,
			'reseller_send' => $this->input->post('pesan')
		);
		$this->db->insert('chat', $data);
		$this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
		redirect('Reseller/cProfile');
	}
}

/* End of file cProfile.php */
