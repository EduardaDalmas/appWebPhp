<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		
	}

	public function lista_usuarios_simples()
	{
		$this->load->view('menu');
		$this->load->model('usuario_model');
		$resultado = $this->usuario_model->getUsuarios();
		$dado = array('usuarios'=>$resultado);
		$this->load->view('usuario/lista_simples', $dado);
	}

	public function lista($pag=0)
	{	
		$this->load->model('usuario_model');
		$limite = 5;
		$dados['total'] =count($this->usuario_model->get()->result());
		$resultado['usuarios'] = $this->usuario_model->getPage($limite, $pag); //(5, 0)

		$this->load->library('pagination');
		$this->load->config('pagination');
		$config = $this->config->item('pagination_config');
		$config['base_url'] = base_url('lista');
		$config['total_rows'] = $dados['total'];
		$config['per_page'] = $limite;


		$this->pagination->initialize($config);

		//$resultado['usuarios'] = $this->usuario_model->get();
		$this->load->view('menu');
		$this->load->view('usuario/lista', $resultado);
	}

	public function novo()
	{
		$this->load->view('menu');
		$this->load->view('usuario/novo');
	}

	public function gravar($id = null)
	{
		$this->load->library('form_validation');

		$this->load->model('usuario_model');

		$regras = array(
			array('field' => 'nome', 'label' => 'nome', 'rules' => 'required'),
			array('field' => 'email', 'label' => 'email', 'rules' => 'required|valid_email'),
			array('field' => 'senha', 'label' => 'senha', 'rules' => 'required'),
			array('field' => 'aniversario', 'label' => 'aniversario', 'rules' => 'required'),
			array('field' => 'genero', 'label' => 'genero', 'rules' => 'required'),
			array('field' => 'cpf', 'label' => 'cpf', 'rules' => 'required|exact_length[11]'),
			array('field' => 'estado', 'label' => 'estado', 'rules' => 'required|exact_length[2]'),
			array('field' => 'cidade', 'label' => 'cidade', 'rules' => 'required'),
			array('field' => 'tipo', 'label' => 'tipo', 'rules' => 'required')
		);

		$this->form_validation->set_rules($regras);

		 if ($this->form_validation->run() == false) {
			 echo "erro de validação";
			 $this->load->view('menu');
			 $this->load->view('usuario/novo');
		 }
		 else {

		$id = $this->input->post('id');
		$dados = array(
			"nome" => $this->input->post('nome'),
			"email" => $this->input->post('email'),
			"senha" => sha1($this->input->post('senha')),
			"aniversario" => $this->input->post('aniversario'),
			"genero" => $this->input->post('genero'),
			"cpf" => $this->input->post('cpf'),
			"estado" => $this->input->post('estado'),
			"cidade" => $this->input->post('cidade'),
			"tipo" => $this->input->post('tipo')
		);

		$this->load->view('menu');
		if ($this->usuario_model->gravar($dados, $id)) {
			$msg['mensagem'] = "Dados gravados com sucesso!";
			$this->load->view('usuario/success', $msg);
		} else {
			echo "Erro ao gravar dados!";
		}
	}
	
	}

	public function editar($id = null)
	{
		if ($id) {
			$this->load->model('usuario_model');
			$dados = $this->usuario_model->get($id);
			if ($dados->num_rows() > 0 ) {
				$valores['id'] = $dados->row()->id;
				$valores['nome'] = $dados->row()->nome;
				$valores['email'] = $dados->row()->email;
				$valores['senha'] = null;
				$valores['aniversario'] = $dados->row()->aniversario;
				$valores['genero'] = $dados->row()->genero;
				$valores['cpf'] = $dados->row()->cpf;
				$valores['estado'] = $dados->row()->estado;
				$valores['cidade'] = $dados->row()->cidade;
				$valores['tipo'] = $dados->row()->tipo;
			}
			$this->load->view('menu');
			$this->load->view('usuario/novo', $valores);
		} 
		else {
			echo "Usuario não localizado";
		}
	}

	public function excluir($id = null)
	{
		if ($id) {
			$this->load->model('usuario_model');
			if ($dados = $this->usuario_model->excluir($id))
			{
				$this->load->view('menu');
				echo "Excluido com sucesso";
			}
			else {
				echo "Erro ao excluir";
			}

		}
	}

	public function pesquisa($nome=null, $pag=0) {
		$this->load->model('usuario_model');
		$limite = 5;

		if (isset($_GET['nome'])) {
			$nome = $_GET['nome'];
		}

		$dados['total'] =count($this->usuario_model->pesquisa_usuarios($nome)->result());
		$resultado['usuarios'] = $this->usuario_model->pesquisa_usuarios_pag($limite, $pag, $nome); 

		$this->load->library('pagination');
		$this->load->config('pagination');
		$config = $this->config->item('pagination_config');

		$config['base_url'] = base_url('usuario/pesquisa/'.$nome);
		$config['total_rows'] = $dados['total'];
		$config['per_page'] = $limite;


		$this->pagination->initialize($config);

		//$resultado['usuarios'] = $this->usuario_model->get();
		$this->load->view('menu');
		$this->load->view('usuario/lista', $resultado);
	}

	public function exporta(){
		//get table
		$usuarios = $this->db->get('usuarios');

		//load library
		$this->load->library('MY_Export');

		//export data
		$this->my_export->to_excel($usuarios, 'Usuários');
	}
}
