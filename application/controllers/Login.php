<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $data["title"] = "Login - CodeIgniter";
        $this->load->view('pages/login', $data);
    }

    public function store()
	{
	    $this->load->model("login_model");

	    $email = $_POST["email"];
	    $password = $_POST['password'];

	    // Chame o método do modelo para obter o usuário com o email fornecido
	    $user = $this->login_model->get_user_by_email($email);

	    if ($user && password_verify($password, $user->password)) {
	        // Senha válida
	        $this->session->set_userdata("logged_user", $user);
	        redirect("dashboard");
	    } else {
	        // Email ou senha inválidos
	        redirect("login");
	    }
	}

    public function logout()
    {
        $this->session->unset_userdata("logged_user");
        redirect("login");
    }
}