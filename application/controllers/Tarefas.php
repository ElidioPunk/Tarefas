<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefas extends CI_Controller {

    function __construct()
	{
		parent:: __construct();
		$this->load->helper('url', 'form');
		$this->load->library('form_validation', 'session');
		$this->load->model('tarefas_model', 'tarefa');
        $this->load->model('user_model', 'user');
    }

    public function adicionar($user=0){

        verifica_login();
        verifica_adm();
        $ci = & get_instance();
        $idg=$ci->session->userdata('id');

        $this->load->helper('form');
		//Regras de validação
		$this->load->library(array('form_validation', 'email'));
		$this->form_validation->set_rules('data_limite', 'Nome', 'trim|required');
        $this->form_validation->set_rules('tarefa', 'Nome', 'trim|required');
        //verifica a valida��o
		if($this->form_validation->run()==FALSE):
			if(validation_errors()):
				set_msg(validation_errors());
				redirect('usuarios/adicionar/'.$user);
			endif;

		else:
			$dados_form = $this->input->post();

            $dados_insert['id_user']=$dados_form['id'];			
			$dados_insert['msg']=$dados_form['tarefa'];
            $dados_insert['data_marc']=date('Y-m-d');
			$dados_insert['data_limite']=$dados_form['data_limite'];
			$dados_insert['estado']=0;
		
			
            if($id=  $this->tarefa->salvar($dados_insert)):

                $rem=$this->user->get_singleId($user);
				$from=$this->user->get_singleId($idg);

               
                
                $this->load->library('email');
                $this->email->from($from->email, 'Identification');
                $this->email->to($rem->email);
                $this->email->subject('Nova Tarefa');
                $this->email->message('Tarefa: '.$dados_form['tarefa']);
            
                if($this->email->send())
                set_msg("tarefa atribuida caom sucesso");
                else
                set_msg("Erro ao mandar no envio de alerta");
                redirect('usuarios/user_gestor/'.$idg);
            else:
                set_msg('Erro ao atribuir tarefa');
                redirect('usuarios/adicionar/'.$id);
            endif;
			
		endif;

        $dados['user']=$user;
        $this->load->view('tarefas/tarefa_add',$dados);
    }

    public function list($id){
        verifica_login();
        $dados['tarefa']=$this->tarefa->getWhereID($id);
        
        $this->load->view('tarefas/tarefas_list', $dados);
    }

}
