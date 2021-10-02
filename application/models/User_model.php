<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
	function __construct(){
		parent::__construct();

	}
	public function salvar($dados){
		if(isset($dados['id_usuer'])&& $dados['id_user']>0):			
			$this->db->where('id_uder', $dados['id_usuer']);
			unset($dados['id_user']);
			$this->db->update('usuarios', $dados);
			return $this->db->affected_rows();

		else:			
			$this->db->insert('usuarios', $dados);
			return $this->db->insert_id();
		endif;
	}

    public function get($agente=0, $active=0, $limit=0, $offset=0){
		if($limit==0):
			$this->db->order_by('nome', 'DESC');
			$query=  $this->db->get('usuarios');
			if($agente!=0)
			$this->db->where('id_user', $agente);
			if($query->num_rows()>0):
				return $query->result();
			else:
				return NULL;
			endif;
		else:
			$this->db->order_by('nome', 'DESC');
			$query=  $this->db->get('usuarios', $limit);
			if($agente!=0)
			$this->db->where('id_user', $agente);
			if($query->num_rows()>0):
				return $query->result();
			else:
				return NULL;
			endif;

		endif;
	}

	public function get_singleEmail($email=0){
		$this->db->where('email', $email);	
		$query=  $this->db->get('usuarios', 1);
		if($query->num_rows()==1):
			$row =$query->row();
			return $row;
		else:
			return NULL;
		endif;

	}
	public function get_singleId($id=0){
		$this->db->where('id_user', $id);	
		$query=  $this->db->get('usuarios', 1);
		if($query->num_rows()==1):
			$row =$query->row();
			return $row;
		else:
			return NULL;
		endif;

	}

	public function getWhereGrupo($grupo=0, $limit=0, $offset=0){

		if($limit==0):
			$this->db->select('*');
			$this->db->from('usuarios');
			
			$this->db->where('grupo', $grupo);		
		
			$query=  $this->db->get();
			if($query->num_rows()>0):
				return $query->result();
			else:
				return NULL;
			endif;
		else:
			$this->db->select('*');
			$this->db->from('usuarios');
			
			$this->db->where('grupo', $grupo);		
		
			$query=  $this->db->get();			
			$query=  $this->db->get($limit);
			if($query->num_rows()>0):
				return $query->result();
			else:
				return NULL;
			endif;

		endif;
	}

	// public function getCli_Rec($id_cli, $limit=0, $offset=0){

	// 	if($limit==0):
	// 		$this->db->select('*');
	// 		$this->db->from('cliente');
	// 		$this->db->join('requisicao', 'requisicao.id_cliente = cliente.id_cliente');
	// 		$this->db->join('produto', 'requisicao.id_produto = produto.id_produto');
	// 		$this->db->where('requisicao.id_cliente', $id_cli);		
	// 		//$this->db->order_by('data', 'DESC');
	// 		$query=  $this->db->get();
	// 		if($query->num_rows()>0):
	// 			return $query->result();
	// 		else:
	// 			return NULL;
	// 		endif;
	// 	else:
	// 		$this->db->select('*');
	// 		$this->db->from('requisicao');
	// 		$this->db->join('requisicao', 'requisicao.id_cliente = cliente.id_cliente');
	// 		$this->db->where('requisicao.id_cliente', $id_cli);		
	// 		//$this->db->order_by('data', 'DESC');			
	// 		$query=  $this->db->get($limit);
	// 		if($query->num_rows()>0):
	// 			return $query->result();
	// 		else:
	// 			return NULL;
	// 		endif;

	// 	endif;
	// }

	// public function get_single($id=0){
	// 	$this->db->where('id_cliente', $id);
	// 	$query=  $this->db->get('cliente', 1);
	// 	if($query->num_rows()==1):
	// 		$row =$query->row();
	// 		return $row;
	// 	else:
	// 		return NULL;
	// 	endif;

	// }

}
