<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}



	public function inserirGrupo($dados){
		return $this->db->insert('grupo',$dados);
	}

	public function salvarMarcacao($nome, $dados){
		return $this->db->insert($nome, $dados);
	}


	public function getExistente($nome){
		$this->db->where("Nome",$nome);
		return $this->db->get('grupo')->result();
	}

	public function getExistenteA($nome){
		$this->db->where("Nome",$nome);
		return $this->db->get('atributos')->result();
	}

	public function getAtributos(){
		$this->db->where("Checado", true);
		return $this->db->get('atributos')->result();
	}

	public function getGrupos(){
		$this->db->where("Checado", false);
		return $this->db->get('grupo')->result();
	}

	public function getGruposAceitos(){
		$this->db->where("Checado", true);
		return $this->db->get('grupo')->result();
	}


	public function getAtributo($id_atributo){
		$this->db->where("Id", $id_atributo);
		return $this->db->get('atributos');
	}

	public function inserirAtributo($dados){
		return $this->db->insert('atributos',$dados);
	}


	public function getIdAtributo($nome){
		$query = $this->db->query("SELECT Id FROM atributos where Nome = '$nome';");
		$dados = $query->row();
		return $dados->Id;
	}

	public function getGrupo($nome){
		$query = $this->db->query("SELECT * FROM grupo where Nome = '$nome';");
		$dados = $query->row();
		return $dados;
	}

	public function getAtributosCategoria($nome){

		$query = $this->db->query("SELECT Id FROM grupo where Nome = '$nome';");
		$dados = $query->row();
		$this->db->where("Id_Grupo", $dados->Id);
		$atributos = $this->db->get('possui')->result();
		
		$retorno = null;

		for ($i = 0; $i< count($atributos); $i++) {
			$this->db->where("Id", $atributos[$i]->Id_Atributo);
			$retorno[$i] =  $this->db->get('atributos')->result();
		}


		return $retorno;

	}

	public function apagarAtributoCategoria($id, $nome){
		echo "oi";
		$query = $this->db->query("SELECT Id FROM grupo where Nome = '$nome';");
		$dados = $query->row();
		var_dump($dados);
		$this->db->where("Id_Grupo",  $dados->Id);
		$this->db->where("Id_Atributo", $id);
		return $this->db->delete('possui');
	}

	public function addAtributo($id, $nome){
		$query = $this->db->query("SELECT Id FROM grupo where Nome = '$nome';");
		$dados = $query->row();
		$inserir["Id_Grupo"] =   $dados->Id;
		$inserir["Id_Atributo"] = $id;
		return $this->db->insert('possui', $inserir);

	}

	public function aceitarGrupo($id){
		$this->db->set('Checado', true);
		$this->db->where('Id', $id);
		$this->db->update('grupo');

		$this->db->where('Id_Grupo', $id);
		$att = $this->db->get('possui')->result(); 

		for ($i = 0; $i< count($att); $i++) {
			$this->db->set('Checado', true);
			$this->db->where("Id", $att[$i]->Id_Atributo);
			$this->db->update('atributos');
		}

	}

	public function excluirGrupo($id){
		$this->db->where('Id_Grupo', $id);
		$att = $this->db->get('possui')->result();

		$this->db->where('Id_Grupo', $id);
		$this->db->delete('possui');

		for ($i = 0; $i< count($att); $i++) {
			$this->db->where("Id", $att[$i]->Id_Atributo);
			$this->db->where("Checado", false);
			$this->db->delete('atributos');
		}


		$this->db->where('Id', $id);
		$this->db->delete('grupo');

	}

}