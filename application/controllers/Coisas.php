<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coisas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Coisas_model', 'Cmodel');
	}


	public function pegaCoisas(){
		$coisas['coisas'] = $this->Cmodel->pegaTudo();
		$this->load->view('pegaDados',$coisas);
	}


}