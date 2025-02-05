<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBahanBaku extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('bahan_baku', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->join('user', 'bahan_baku.nm_supplier = user.id_user', 'left');
		return $this->db->get()->result();
	}
	public function get_data($id)
	{
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->where('id_bb', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_bb', $id);
		$this->db->update('bahan_baku', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_bb', $id);
		$this->db->delete('bahan_baku');
	}
}

/* End of file mBahanBaku.php */
