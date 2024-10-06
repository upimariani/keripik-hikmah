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

		//notif dihilangkan
		$stat = array(
			'stat_read' => '1'
		);
		$this->db->where('id_reseller', $id);
		$this->db->update('chat', $stat);


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

	//chatting supplier
	public function chat_supplier($id)
	{
		$dt_stat = array(
			'stat_read' => '1'
		);
		$this->db->where('id_user', $id);
		$this->db->update('chat', $dt_stat);


		$data = array(
			'chat' => $this->mChat->chat_supplier($id),
			'id_user' => $id
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/navbar');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/vChatSupplier', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function send_supplier($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'id_reseller' => '3',
			'gudang_send' => $this->input->post('message')
		);
		$this->db->insert('chat', $data);
		$this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
		redirect('Gudang/cDashboard/chat_supplier/' . $id_user);
	}
}

/* End of file cDashboard.php */
