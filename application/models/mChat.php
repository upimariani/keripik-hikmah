<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mChat extends CI_Model
{
	public function chat()
	{
		return $this->db->query("SELECT * FROM `chat` JOIN reseller ON chat.id_reseller=reseller.id_reseller WHERE reseller.id_reseller='" . $this->session->userdata('id_reseller') . "' AND id_user='2'")->result();
	}
	public function chat_gudang($id)
	{
		return $this->db->query("SELECT * FROM `chat` JOIN reseller ON chat.id_reseller=reseller.id_reseller WHERE reseller.id_reseller='" . $id . "' AND id_user='2'")->result();
	}

	//chatting gudang dengan supplier
	public function chat_supplier($id)
	{
		return $this->db->query("SELECT * FROM `chat` JOIN user ON user.id_user=chat.id_user WHERE user.id_user='" . $id . "'")->result();
	}
}

/* End of file mChat.php */
