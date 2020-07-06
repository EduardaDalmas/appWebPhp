<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function index()
	{
        $this->load->view("menu");
        $this->load->view("login");
    }

    public function autentica()
	{
        $email = $this->input->post("email");
        $senha = sha1($this->input->post("password"));
        $this->load->model("usuario_model");
        $usuario = $this->usuario_model->buscaUsuario($email, $senha);
        if ($usuario) {
            //echo "usuario encontrado";
            $this->session->set_userdata("usuario_logado", $usuario);
            redirect("/");
        } 
        else {
           // echo "Não encontrado";
           $dados = array("login"=> $email);
           $this->load->view("menu");
           $this->load->view("login", $dados);
        }
    }

    public function logoff() {
        $this->session->unset_userdata('usuario_logado');
        redirect("/");
    }
}

