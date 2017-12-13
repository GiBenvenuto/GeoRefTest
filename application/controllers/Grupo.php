<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Grupo_model', 'Gmodel');
	}


	function sugerir_grupos(){
		$dados_listar['atributos'] = $this->Gmodel->getAtributos();

		$this->load->view('html-header');
		$this->load->view('menu_usuario');
		$this->load->view('home');
		$this->load->view('Grupos/sugerir_grupos',$dados_listar);
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	function sugerir_atributos($nome){
		$dados_listar['atributos'] = $this->Gmodel->getAtributos();
		$dados_listar['nome'] = $nome;


		$this->load->view('html-header');
		$this->load->view('menu_usuario');
		$this->load->view('home');
		$this->load->view('Grupos/sugerir_atributos',$dados_listar);
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	function add_atributo($id_atributo){
		$this->Gmodel->getAtributo($id_atributo);
		redirect(base_url('Grupo/sugerir_grupos'));

	}

	function inserir_grupo(){
		$dados['Nome'] = $this->input->post('nome');
		$dados['Descricao'] = $this->input->post('descricao');
		$dados['Checado'] = false;
		$usuario = $this->session->userdata('usuario')->Senha;
		$dados['Login_Sugestor'] = $usuario;
		
		if($this->Gmodel->getExistente($dados['Nome'])){

			$mensagem = "Esse grupo já existe !";

			$this->session->set_flashdata('msg', $mensagem);
			redirect(base_url('Grupo/sugerir_grupos'));

		}else{
			if($this->Gmodel->inserirGrupo($dados)){
				$nome = $dados['Nome'];
				
				$this->sugerir_atributos($nome);
			}
			else{ 
				$mensagem = "Houve um erro ao criar o grupo!";
				$this->session->set_flashdata('msg', $mensagem);
				redirect(base_url('Grupo/sugerir_grupos'));


			}
			
		}



	}

}