<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model
{
	public function search($searching)
	{
		if (empty($searching)) {
			return array();
		}

		$searching = $this->input->post("searching");
		$this->db->like("name", $searching);
		return $this->db->get("tb_games")->result_array();
	}
}