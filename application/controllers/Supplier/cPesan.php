<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPesan extends CI_Controller
{

	public function index()
	{
		$data = array(
			'chat' => $this->db->query("SELECT * FROM `chat` JOIN user ON user.id_user=chat.id_user WHERE chat.id_user='" . $this->session->userdata('id_user') . "'")->result()
		);
		$this->load->view('Supplier/Layouts/head');
		$this->load->view('Supplier/Layouts/navbar');
		$this->load->view('Supplier/Layouts/aside');
		$this->load->view('Supplier/vPesan', $data);
		$this->load->view('Supplier/Layouts/footer');
	}
	public function send_supplier()
	{
		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'id_reseller' => '3',
			'reseller_send' => $this->input->post('message')
		);
		$this->db->insert('chat', $data);
		$this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
		redirect('Supplier/cPesan');
	}
}

/* End of file cPesan.php */
