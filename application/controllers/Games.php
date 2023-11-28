<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		permission();
		$this->load->model("games_model");
	}

	public function index()
	{
		$data["values"] = $this->games_model->list_data_database();
		$data["title"] = "Games - CodeIgniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new_games()
	{
		$data["title"] = "Games - CodeIgniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function store()
	{
		$game = $_POST;
		$game["user_id"] = 1;
		
		$this->games_model->store($game);
		redirect("dashboard");
	}

	public function edit($id)
	{
		$data["value"] = $this->games_model->show($id);
		$data["title"] = "Editar Game - CodeIgniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id)
	{
		$game = $_POST;
		$this->games_model->update($id, $game);
		redirect("games");
	}

	public function delete($id)
	{
		$this->games_model->destroy($id);
		redirect("games");
	}
}
