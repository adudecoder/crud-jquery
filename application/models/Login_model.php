<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function get_user_by_email($email)
    {
        // Substitua 'users' pelo nome real da sua tabela no banco de dados
        $query = $this->db->get_where('tb_users', array('email' => $email));

        // Certifique-se de que a coluna 'password' está definida corretamente na tabela
        return $query->row();
    }

	public function store($email, $password)
	{
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		$user = $this->db->get("tb_users")->row_array();
		return $user;
	}
}