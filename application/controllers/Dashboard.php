<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		permission();
		$this->load->model("games_model");
	}

	public function index()
	{
		// permission();
		// $this->load->model("games_model");
		$data["values"] = $this->games_model->list_data_database();
		$data["title"] = "Dashboad - CodeIgniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function search()
	{
		$this->load->model("search_model");
		$data["title"] = "Resultado da pesquisa por *". $_POST["searching"] ."*";
		$data["result"] = $this->search_model->search($_POST);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/result', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
