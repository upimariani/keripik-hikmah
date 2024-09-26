<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mChat extends CI_Model
{
	public function chat()
	{
		return $this->db->query("SELECT * FROM `chat` JOIN reseller ON chat.id_reseller=reseller.id_reseller WHERE reseller.id_reseller='" . $this->session->userdata('id_reseller') . "'")->result();
	}
	public function chat_gudang($id)
	{
		return $this->db->query("SELECT * FROM `chat` JOIN reseller ON chat.id_reseller=reseller.id_reseller WHERE reseller.id_reseller='" . $id . "'")->result();
	}
}

/* End of file mChat.php */
