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
			'chat' => $this->mChat->chat(),
			'profile' => $this->db->query("SELECT * FROM `reseller` WHERE id_reseller='" . $this->session->userdata('id_reseller') . "'")->row()
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
	public function perbaharui($id)
	{
		$data = array(
			'nama_reseller' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$this->db->where('id_reseller', $id);
		$this->db->update('reseller', $data);
		$this->session->set_flashdata('success', 'Data Reseller berhasil diperbaharui');
		redirect('Reseller/cProfile');
	}
}

/* End of file cProfile.php */
