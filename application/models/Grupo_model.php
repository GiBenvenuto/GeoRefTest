<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}



	public function inserirGrupo($dados){
		return $this->db->insert('grupo',$dados);
	}


	public function getExistente($nome){
		$this->db->where("Nome",$nome);
		return $this->db->get('grupo')->result();
	}

	public function getAtributos(){
		return $this->db->get('atributos')->result();
	}

	public function getAtributo($id_atributo){
		$this->db->where("Id", $id_atributo);
		return $this->db->get('atributos');
	}

	public function inserirAtributo($dados){
		return $this->db->insert('atributos',$dados);
	}

	public function addAtributos($dados){
		
	}
}