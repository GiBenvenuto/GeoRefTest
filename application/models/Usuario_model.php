<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}


	// Método responsavel pela inserção dos dados na tabela. Como em config/autoload.php já carregamos a biblioteca 'database' em todas as páginas, não será necessário fazer um $this->load->library('database') em cada função. Acessamos o banco de dados utilizando $this->db->MÉTODO(PARAMETRO). Aconselho pesquisar na internet "como inserir no banco de dados com o codeigniter", "como deletar no banco de dados com o codeigniter", "como editar no banco de dados com o codeigniter"... para saber como usar cada uma dessas funções. Como nosso exemplo é bem simples, basta utilizar o método insert('nome_da_tabela',$dados). É importante ressaltar que para que isso funcione, o array $dados tem que ser montado da forma correta como está no banco de dados. No nosso caso usamos no controlador assim:
	// $dados['nome'] = $nome;
	// $dados['cpf'] = $cpf;
	// Dessa forma a função inserir "monta" a query do banco de dados utilizando o nome do indice e o dado a ser inserido. INSERT into pessoa ('nome','cpf') VALUES ($nome,$cpf).

	function logar($dados){

		$this->db->where($dados);
		return $this->db->get('usuario')->result();
		
	}


	public function inserir($dados){
		return $this->db->insert('usuario',$dados);
	}

	// Método responsável por puxar informações do banco. Existem diversas formas de utilizar esse método (where, from, join...), também recomendo que pesquise na internet para fazer métodos mais avançados ou me chama no whats (18) 9 97627854 (Pietro).
	public function listar(){
		return $this->db->get('usuario')->result();
	}

	// Método responsável por puxar a informação de uma pessoa no banco. Primeiro mostramos pro banco quem devemos puxar, utilizando o where("id",$id), e depois realizamos uma busca. O banco vai puxar todos que tiverem o id = $id. Como $id é chave primária, so´existe uma pessoa no banco, e ele vai retornar essa pessoa.
	public function ver($id){
		$this->db->where("id",$id);
		return $this->db->get('usuario')->result();
	}


	// Método responsavel por alterar os dados da pessoa que tem o id = $id, e os dados alterados são os que estão contidos no vetor $dados. É simples assim, sempre será simples assim.
	public function alterar($id,$dados){
		$this->db->where("id",$id);
		return $this->db->update("usuario",$dados);
	}


	// Método que apaga, igual o método ver($id), mas esse em vez de fazer um select, faz um delete.
	public function apagar($id){
		$this->db->where('id',$id);
		return $this->db->delete('usuario');
	}
	
	//CRUD é simples, basta acreditar que é simples e sempre que precisar fazer um, use um anterior como base.
}