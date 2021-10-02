<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct()
	{
		parent:: __construct();
		$this->load->helper('url', 'form');
		$this->load->library('form_validation', 'session');
		$this->load->model('user_model', 'user');
    }


	public function index()
	{
        verifica_login();
		verifica_adm();
        $ci = & get_instance();
		if( $ci->session->userdata('gestor_master')):
			$id=$ci->session->userdata('id');
			$dados['user']=$this->user->get($id);
		else:
			$dados['user']=$this->user->get();
		endif;
		$dados['id']=$ci->session->userdata('id');
		$this->load->view('user/user_list', $dados);
	}

	public function user_gestor($gestor)
	{
		verifica_login();
		verifica_adm();
       
		$dados['user']=$this->user->get($gestor);
		
        $dados['gestor']=1;
		$this->load->view('user/user_list', $dados);
	}

    public function adicionar($grupo=0, $id=0)		
	{
		verifica_login();
		verifica_adm();
        $this->load->helper('form');
		//Regras de validação
		$this->load->library(array('form_validation', 'email'));
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('end', 'Endereco', 'trim|required');
		$this->form_validation->set_rules('cont', 'Contacto', 'trim|required');
		$this->form_validation->set_rules('telef', 'Telefone', 'trim|required');
		$this->form_validation->set_rules('data_nasc', 'Data de Nacmento', 'trim|required');

		//verifica a valida��o
		if($this->form_validation->run()==FALSE):
			if(validation_errors()):
				set_msg(validation_errors());
				redirect('usuarios/adicionar');
			endif;

		else:
			$dados_form = $this->input->post();
			$this->load->library('upload', config_upload());
			if($this->upload->do_upload('foto')):			
				$dados_upload=$this->upload->data();
				if(isset($dados_form['id_user']))
				$dados_insert['id_user']=$dados_form['id_user'];
				$dados_insert['nome']=$dados_form['nome'];
				$dados_insert['email']=$dados_form['email'];
				$dados_insert['endereco']=$dados_form['end'];
				$dados_insert['celular']=$dados_form['cont'];
				$dados_insert['telef']=$dados_form['telef'];
				$dados_insert['data_nasc']=$dados_form['data_nasc'];
				$dados_insert['senha']=password_hash($dados_form['senha'], PASSWORD_DEFAULT);
				$dados_insert['grupo']=$dados_form['grupo'];
				$dados_insert['subord']=$dados_form['subord'];
				$dados_insert['foto']=$dados_upload['file_name'];

				
				// salvar na BD
				if($id=  $this->user->salvar($dados_insert)):
					set_msg('Usuario salvo com sucesso');
					redirect('ususarios/');
				else:
					set_msg('Erro ao cadastrar');
					redirect('userios/');
				endif;
			else:
				$msg= $this->upload->display_errors();
				$msg.='<p>São permitidos arquivos JPG e PNG até 512kb</p>';
				set_msg($msg);
			endif;
		endif;
        $dados['gestor']=$this->user->getWhereGrupo(2);
		$dados['grupo']=$grupo;
		if($id!=0)
		$dados['edit']=$this->user->get_singleId($id);
		$this->load->view('user/user_add', $dados);
	}

	public function login(){
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		//Verificar o formuário
		if($this->form_validation->run()==FALSE):
			if(validation_errors()):
				echo validation_errors();
			endif;
		else:
			$dados_form = $this->input->post();
			$user = $this->user->get_singleEmail($dados_form['email']);
			if($user != Null):
				//usuario existe
				
				if(password_verify($dados_form['password'], $user->senha)):
					$this->session->set_userdata('nome',  $user->nome);
					$this->session->set_userdata('id', $user->id_user);						
					$this->session->set_userdata('foto', $user->foto);
					$this->session->set_userdata('grupo', $user->grupo);
					//senha Ok, Login
					$this->session->set_userdata('admin', FALSE);
					if($user->grupo == 1 || $user->grupo == 2):
						$this->session->set_userdata('admin', TRUE);
						$this->session->set_userdata('acesso', TRUE);
						
                        redirect('usuarios', 'refresh');
                   
                    else:                        
						$this->session->set_userdata('acesso', TRUE);
						redirect('tarefas/list/'.$user->id_user, 'refresh');

					endif;					

				else:
					//senha incorreta
					set_msg('Senha incorrecta');
					//redirect('login', 'refresh');
				endif;
			else:
				//usuario não existe
				set_msg('Usuario nao existe');
			endif;
		endif;
		
		$dados['titulo']='Acesso ao sistema';
		
		$this->load->view('auth/login', $dados);
	}
	public function logout(){
		$this->session->unset_userdata('acesso');
		$this->session->unset_userdata('adm');
		$this->session->unset_userdata('grupo');
		$this->session->unset_userdata('nome');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('foto');
		set_msg('Voce saiu do sistema');
		redirect('usuarios/login');
	}

}
