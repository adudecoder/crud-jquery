<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games_model extends CI_Model 
{
	public function list_data_database() 
	{
		return $this->db->get("tb_games")->result_array();
	}

	public function store($game) 
	{
		$this->db->insert("tb_games", $game);
	}

	public function show($id) 
	{
		return $this->db->get_where("tb_games", array(
			"id" => $id
		))->row_array();
	}

	public function update($id, $game) 
	{
		$this->db->where("id", $id);
		return $this->db->update("tb_games", $game);
	}

	public function destroy($id) 
	{
		$this->db->where("id", $id);
		return $this->db->delete("tb_games");
		redirect("games");
	}
}