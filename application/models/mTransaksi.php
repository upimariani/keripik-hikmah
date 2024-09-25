<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function select($id_reseller)
	{
		return $this->db->query("SELECT * FROM `transaksi_bj` JOIN reseller ON transaksi_bj.id_reseller=reseller.id_reseller WHERE transaksi_bj.id_reseller='" . $id_reseller . "'")->result();
	}
	public function update_status($id, $data)
	{
		$this->db->where('id_tranbj', $id);
		$this->db->update('transaksi_bj', $data);
	}
}

/* End of file mTransaksi.php */
