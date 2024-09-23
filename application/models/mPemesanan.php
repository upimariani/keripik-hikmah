<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPemesanan extends CI_Model
{
	public function select_pemesanan()
	{
		return $this->db->query("SELECT * FROM `transaksi_bb` JOIN user ON user.id_user=transaksi_bb.id_user")->result();
	}
	public function insert_pemesanan($data)
	{
		$this->db->insert('transaksi_bb', $data);
	}
	public function insert_detail($data)
	{
		$this->db->insert('detail_transaksibb', $data);
	}
	public function update_status($id, $data)
	{
		$this->db->where('id_tranbb', $id);
		$this->db->update('transaksi_bb', $data);
	}
}

/* End of file mPemesanan.php */
