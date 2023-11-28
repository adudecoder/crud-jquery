<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function index()
    {
        $data["title"] = "Sign-up - CodeIgniter";
        $this->load->view('pages/signup', $data);
    }

    public function store()
    {
        $this->load->model("users_model");

        // Obtenha os dados do formulário
        $rawPassword = $_POST['password'];

        // Crie o hash da senha
        $password = password_hash($rawPassword, PASSWORD_BCRYPT);

        // Crie o array com os dados do usuário
        $user = array(
            "name" => $_POST["name"],
            "country" => $this->input->post("country"),
            "email" => $_POST["email"],
            "password" => $password, // Use a variável $password aqui
        );

        // Chame o método do modelo para armazenar o usuário
        $this->users_model->store($user);

        // Redirecione para a página de login
        redirect("login");
    }
}
