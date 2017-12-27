<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}


	//Responsavel por carregar a tela inicial. O método index() é sempre chamado quando a função nao é especificada. Em application/config/routes está definido que o controller default é o Home, ou sejá, se nenhum controlador é especificado na URL, o Home será carregado, e se nenhuma função é especificada, a index é carregada. Dessa forma, se acessar-mos somente localhost/projeto_base , essa é a função que é chamada.
	public function index(){
		$this->load->view('html-header');
		$this->load->view('menu');
		$this->load->view('home');
		$this->load->view('mapa');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	public function area_usuario(){
		$this->load->view('html-header');
		$this->load->view('menu_usuario');
		$this->load->view('home');
		$this->load->view('mapa');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	public function area_moderador(){
		$this->load->view('html-header');
		$this->load->view('Usuario/area_moderador');
		$this->load->view('home');
		$this->load->view('mapa');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	public function cadastrar(){
		$this->load->view('html-header');
		$this->load->view('menu');
		$this->load->view('Usuario/formulario');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

}
