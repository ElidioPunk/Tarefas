<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tarefas_model extends CI_Model {
	function __construct(){
		parent::__construct();

	}
	public function salvar($dados){
		if(isset($dados['id_tarefa'])&& $dados['id_tarefa']>0):			
			$this->db->where('id_tarefa', $dados['id_tarefa']);
			unset($dados['id_tarefa']);
			$this->db->update('tarefas', $dados);
			return $this->db->affected_rows();

		else:			
			$this->db->insert('tarefas', $dados);
			return $this->db->insert_id();
		endif;
	}

    public function getWhereID($id=0, $limit=0, $offset=0){

		if($limit==0):
			$this->db->select('*');
			$this->db->from('tarefas');
			
			$this->db->where('id_user', $id);		
		
			$query=  $this->db->get();
			if($query->num_rows()>0):
				return $query->result();
			else:
				return NULL;
			endif;
		else:
			$this->db->select('*');
			$this->db->from('tarefas');
			
			$this->db->where('id_user', $id);		
		
			$query=  $this->db->get();			
			$query=  $this->db->get($limit);
			if($query->num_rows()>0):
				return $query->result();
			else:
				return NULL;
			endif;

		endif;
	}
}