<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBbKeluar extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('bb_keluar', $data);
	}
	public function select()
	{
		return $this->db->query("SELECT * FROM `bb_keluar` JOIN bahan_baku ON bb_keluar.id_bb=bahan_baku.id_bb")->result();
	}
	// public function get_data($id)
	// {
	// 	return $this->db->query("SELECT * FROM `bb_keluar` JOIN bahan_baku ON bb_keluar.id_bb=bahan_baku.id_bb WHERE id_bb_keluar='" . $id . "'")->row();
	// }
	public function update($id, $data)
	{
		$this->db->where('id_bb_keluar', $id);
		$this->db->update('bb_keluar', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_bb_keluar', $id);
		$this->db->delete('bb_keluar');
	}
}

/* End of file mBbKeluar.php */
