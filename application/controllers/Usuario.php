<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Usuario_model', 'Umodel');
	}


	//Responsavel por carregar a tela inicial. O método index() é sempre chamado quando a função nao é especificada. Em application/config/routes está definido que o controller default é o Home, ou sejá, se nenhum controlador é especificado na URL, o Home será carregado, e se nenhuma função é especificada, a index é carregada. Dessa forma, se acessar-mos somente localhost/projeto_base , essa é a função que é chamada.

	function abrir_login(){
		$this->load->view('html-header');
		$this->load->view('menu');
		$this->load->view('Usuario/login_1');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	 

	public function novo_usuario(){
		
		$this->load->view('html-header');
		$this->load->view('menu');
		$this->load->view('Usuario/cadastrar');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}


public function cadastrar(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nome','nome','required|min_length[4]', 'Nome inválido');
		$this->form_validation->set_rules('email','E-mail','required|valid_email|is_unique[usuario.Email]', 'E-Mail inválido');
		$this->form_validation->set_rules('senha', 'senha', 'required|max_length[16]|min_length[6]', 'Senha inválida');
		$this->form_validation->set_rules('csenha', 'csenha', 'matches[senha]', 'Senhas não batem');

		// Vou deixar o de email aqui também pois ele tem umas caracteristicas diferentes. O is_unique verifica no banco[tabela.campo] se o email digitado não foi utilizado ainda. 
		// $this->form_validation->set_rules('email','E-mail','required|valid_email|is_unique[membro.email]');
		if($this->form_validation->run()){
			$dados['Nome'] = $this->input->post('nome');
			$dados['Email'] = $this->input->post('email');
			$dados['Senha'] = md5($this->input->post('senha').$dados['Email']);

			if($this->Umodel->inserir($dados)){
				$mensagem = $nome." inserido com sucesso!";
				$this->session->set_flashdata('sucesso', $mensagem);
			}
			else{ 
				$mensagem = "Houve um erro ao processar seu cadastro!";
				$this->session->set_flashdata('erro', $mensagem);
			}

		}else{
			$mensagem = "Houve um erro ao validar seu cadastro!";

			$this->session->set_flashdata('erro', $mensagem);
		}

		redirect(base_url('cadastrar_usuario'));
	}

	function logar(){
		$this->load->library('session');

		$dados['Email'] = $this->input->post('email');
		$dados['Senha'] = $this->input->post('senha');
		$chave['Senha'] = md5($dados['Senha'].$dados['Email']);
		
		
		$result = $this->Umodel->logar($chave);

		if (count($result) == 0){

			$this->session->set_flashdata('erro', "Erro");
			redirect(base_url('login_usuario'));
		}
		else{
			$this->session->set_userdata("usuario",$result[0]);
			if ($result[0]->Grau_Permissao == 0){
				redirect('Home/area_usuario');
			}
			
			}
	}

	function area(){
		

		$this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('Usuario/area', $dados_listar);
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

}
