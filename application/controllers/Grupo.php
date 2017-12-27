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

	function sugerir_marcacao(){
		$nome = $_POST['selectGrupo'];
		$this->session->set_userdata('nomeGrupo', $nome);
		$dados_listar['atributos'] = $this->Gmodel->getAtributosCategoria($nome);

		$this->load->view('html-header');
		$this->load->view('menu_usuario');
		$this->load->view('home');
		$this->load->view('Grupos/sugerir_marcacoes',$dados_listar);
		$this->load->view('Grupos/mapa_marcacao',$dados_listar);
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	function escolher_grupo(){
		$dados_listar['grupo'] = $this->Gmodel->getGruposAceitos();

		$this->load->view('html-header');
		$this->load->view('menu_usuario');
		$this->load->view('home');
		$this->load->view('Grupos/escolher_grupo',$dados_listar);
		$this->load->view('footer');
		$this->load->view('html-footer');
	}


	function validar_grupos(){
		$dados_listar['grupos'] = $this->Gmodel->getGrupos();

		$this->load->view('html-header');
		$this->load->view('Usuario/area_moderador');
		$this->load->view('home');
		$this->load->view('Grupos/validar_grupos',$dados_listar);
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	function ver_grupo($nome){

		$dados_listar['atributos'] = $this->Gmodel->getAtributosCategoria($nome);
		$dados_listar['grupo'] = $this->Gmodel->getGrupo($nome);



		$this->load->view('html-header');
		$this->load->view('Usuario/area_moderador');
		$this->load->view('home');
		$this->load->view('Grupos/ver_grupo', $dados_listar);
		$this->load->view('Grupos/listar_atributos', $dados_listar);
		$this->load->view('Grupos/aceitar_grupo', $dados_listar);
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	function aceitar_grupo($id){
		$this->Gmodel->aceitarGrupo($id);
		redirect(base_url('Grupo/validar_grupos'));

	}

	function excluir_grupo($id){
		$this->Gmodel->excluirGrupo($id);
		redirect(base_url('Grupo/validar_grupos'));
	}


	function salvar_marcacao(){
		$atributos = $this->session->userdata('att');
		$nome = $this->session->userdata('nomeGrupo');
		var_dump($nome);
		foreach ($atributos as $at ) {
			$dados[$at[0]->Nome] = $this->input->post($at[0]->Nome);
		}
		$dados['latitude'] = $this->input->post('lat');
		$dados['latitude'] = $this->input->post('long');

		$this->Gmodel->salvarMarcacao($nome, $dados);
		redirect(base_url('Grupo/escolher_grupo'));

	}

	function sugerir_atributos(){
		$nome =$this->session->userdata("nome");
		$dados['atributos'] = $this->Gmodel->getAtributos();
		$dados_listar['atributos'] = $this->Gmodel->getAtributosCategoria($nome);
		$dados['nome'] = $nome;


		$this->load->view('html-header');
		$this->load->view('menu_usuario');
		$this->load->view('home');
		$this->load->view('Grupos/sugerir_atributos',$dados);
		$this->load->view('Grupos/listar_atributos', $dados_listar);
		$this->load->view('Grupos/fim');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	function add_atributo(){
		$id = $_POST['select'];
		$nome = $this->session->userdata("nome");

		$this->Gmodel->addAtributo($id, $nome);
		redirect(base_url('Grupo/sugerir_atributos'));

	}


	function add_novoAtributo($id, $nome){
		$this->Gmodel->addAtributo($id, $nome);
		redirect(base_url('Grupo/sugerir_atributos'));
	}

	function apagar_atributo_categoria($id, $nome){
		$this->Gmodel->apagarAtributoCategoria($id, $nome);
		redirect(base_url('Grupo/sugerir_atributos'));
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
				$this->session->set_userdata('nome',$nome);

				redirect('Grupo/sugerir_atributos');

			}
			else{ 
				$mensagem = "Houve um erro ao criar o grupo!";
				$this->session->set_flashdata('msg', $mensagem);
				redirect(base_url('Grupo/sugerir_grupos'));


			}

		}

	}


	function inserir_atributo(){
		$dados['Nome'] = $this->input->post('nome');
		$dados['Tipo'] = $_POST['tipo'];
		$dados['Tam'] = $this->input->post('tamanho');
		$dados['Checado'] = false;
		$usuario = $this->session->userdata('usuario')->Senha;
		$dados['Login_Sugestor'] = $usuario;

		if($this->Gmodel->getExistenteA($dados['Nome'])){

			$mensagem = "Esse atributo já existe !";

			$this->session->set_flashdata('msg', $mensagem);
			redirect(base_url('Grupo/sugerir_atributos'));

		}else{
			if($this->Gmodel->inserirAtributo($dados)){
				$id = $this->Gmodel->getIdAtributo($dados['Nome']);
				$nome = $this->session->userdata("nome");

				$this->add_novoAtributo($id, $nome);
				
				redirect('Grupo/sugerir_atributos');

			}
			else{ 
				$mensagem = "Houve um erro ao criar o grupo!";
				$this->session->set_flashdata('msg', $mensagem);
				redirect(base_url('Grupo/sugerir_atributos'));


			}

		}



	}

}