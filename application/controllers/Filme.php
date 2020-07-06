<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filme extends CI_Controller {

	public function index()
	{
		
	}

	public function lista_filme()
	{
		$this->load->view('menu');
		//carregar modelo aqui
		$this->load->model('filme_model');
		$resultado = $this->filme_model->getFilmes();
		$dado = array('filmes'=>$resultado);
		$this->load->view('filme/lista_filme', $dado);
	}

	public function listaFilme($pag=0)
	{	
		$this->load->model('filme_model');
		$limite = 5;
		$dados['total'] =count($this->filme_model->get()->result());
		$resultado['filmes'] = $this->filme_model->getPage($limite, $pag); //(5, 0)

		$this->load->library('pagination');
		$this->load->config('pagination');
		$config = $this->config->item('pagination_config');
		$config['base_url'] = base_url('filme/listaFilme');
		$config['total_rows'] = $dados['total'];
		$config['per_page'] = $limite;


		$this->pagination->initialize($config);

		//$resultado['filmes'] = $this->filme_model->get();
		$this->load->view('menu');
		$this->load->view('filme/listaFilme', $resultado);
	}
	
	public function novoFilme()
	{
		$this->load->view('menu');
		$this->load->view('filme/novoFilme');
	}

	public function gravar()
	{
		$this->load->library('form_validation');

		$this->load->model('filme_model');

		$regras = array(
			array('field' => 'titulo', 'label' => 'titulo', 'rules' => 'required'),
			array('field' => 'genero', 'label' => 'genero', 'rules' => 'required'),
			array('field' => 'produtor', 'label' => 'produtor', 'rules' => 'required'),
			array('field' => 'gravadora', 'label' => 'gravadora', 'rules' => 'required'),
			array('field' => 'classificacao', 'label' => 'classificacao', 'rules' => 'required'),
			array('field' => 'diretor', 'label' => 'diretor', 'rules' => 'required'),
			array('field' => 'diretor_musical', 'label' => 'diretor_musical', 'rules' => 'required'),
			array('field' => 'roteirista', 'label' => 'roteirista', 'rules' => 'required'),
			array('field' => 'cinegrafista', 'label' => 'cinegrafista', 'rules' => 'required'),
			array('field' => 'origem', 'label' => 'origem', 'rules' => 'required'),
			array('field' => 'lancamento', 'label' => 'lancamento', 'rules' => 'required|exact_length[4]'),
			array('field' => 'tempo', 'label' => 'tempo', 'rules' => 'required')
		);

		$this->form_validation->set_rules($regras);

		 if ($this->form_validation->run() == false) {
			 echo "erro de validação";
			 $this->load->view('menu');
			 $this->load->view('filme/novoFilme');
		 }
		 else {
		$id = $this->input->post('id');
		
		$dados = array(
			"titulo" => $this->input->post('titulo'),
			"genero" => $this->input->post('genero'),
			"produtor" => $this->input->post('produtor'),
			"gravadora" => $this->input->post('gravadora'),
			"classificacao" => $this->input->post('classificacao'),
			"diretor" => $this->input->post('diretor'),
			"diretor_musical" => $this->input->post('diretor_musical'),
			"roteirista" => $this->input->post('roteirista'),
			"cinegrafista" => $this->input->post('cinegrafista'),
			"origem" => $this->input->post('origem'),
			"lancamento" => $this->input->post('lancamento'),
			"tempo" => $this->input->post('tempo'),
		);

		//echo var_dump($dados);
		$this->load->view('menu');
		if ($this->filme_model->gravar($dados, $id)) {
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
			$this->load->model('filme_model');
			$dados = $this->filme_model->get($id);
			if ($dados->num_rows() > 0 ) {
				$valores['id'] = $dados->row()->id;
				$valores['titulo'] = $dados->row()->titulo;
				$valores['genero'] = $dados->row()->genero;
				$valores['produtor'] = $dados->row()->produtor;
				$valores['gravadora'] = $dados->row()->gravadora;
				$valores['classificacao'] = $dados->row()->classificacao;
				$valores['diretor'] = $dados->row()->diretor;
				$valores['diretor_musical'] = $dados->row()->diretor_musical;
				$valores['roteirista'] = $dados->row()->roteirista;
				$valores['cinegrafista'] = $dados->row()->cinegrafista;
				$valores['origem'] = $dados->row()->origem;
				$valores['lancamento'] = $dados->row()->lancamento;
				$valores['tempo'] = $dados->row()->tempo;
			}
			$this->load->view('menu');
			$this->load->view('filme/novoFilme', $valores);
		} 
		else {
			echo "Filme não localizado";
		}
	}

	public function excluir($id = null)
		{
			if ($id) {
				$this->load->model('filme_model');
				if ($dados = $this->filme_model->excluir($id))
				{
					$this->load->view('menu');
					echo "Excluido com sucesso";
				}
				else {
					echo "Erro ao excluir";
				}

			}
		}

		public function pesquisaFilme($titulo=null, $pag=0) {
			$this->load->model('filme_model');
			$limite = 5;
	
			if (isset($_GET['titulo'])) {
				$titulo = $_GET['titulo'];
			}
	
			$dados['total'] =count($this->filme_model->pesquisa_filmes($titulo)->result());
			$resultado['filmes'] = $this->filme_model->pesquisa_filmes_pag($limite, $pag, $titulo); 
	
			$this->load->library('pagination');
			$this->load->config('pagination');
			$config = $this->config->item('pagination_config');
	
			$config['base_url'] = base_url('filme/pesquisaFilme/'.$titulo);
			$config['total_rows'] = $dados['total'];
			$config['per_page'] = $limite;
	
	
			$this->pagination->initialize($config);
	
			//$resultado['filmes'] = $this->filme_model->get();
			$this->load->view('menu');
			$this->load->view('filme/listaFilme', $resultado);
		}

		public function exportaFilme(){
			//get table
			$filmes = $this->db->get('filmes');
	
			//load library
			$this->load->library('MY_Export');
	
			//export data
			$this->my_export->to_excel($filmes, 'Filmes');
		}
}
