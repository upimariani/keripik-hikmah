<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
	public function katalog()
	{
		return $this->db->query("SELECT * FROM `bahan_jadi`")->result();
	}
}

/* End of file mKatalog.php */
