<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function Login() {
		parent::__construct();	
		$this->load->model('Usuario_model');
	}

	public function index()	{
		//armazena URL atual para voltar a página correta após login
		$var['url_anterior'] = $this->session->userdata('url_anterior');
		$this->load->view('admin/login', $var);
	}
	
	/**
	 * Verificações para login do usuário
	 * @author Novak
	 */
	public function logar()	{
		//$dados recebe tudo o que vem da view, trata e manda pro banco
		$dados = $this->input->post();
	
		$this->initValidacao();
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('erro', validation_errors());
			redirect('admin/login');
		}else{

			$dados['usuario'] = trim($dados['txt_email']);
			$dados['senha'] = md5($dados['txt_pass']);
			
			//$var recebe retornos do banco
			$var = (array) $this->Usuario_model->logar($dados);
			
			if($var === false):
				$this->session->set_userdata('txt_email', $dados['usuario']);
				$this->session->set_flashdata('erro', 'Email e/ou Senha inválidos!');
				$this->Log_model->salvar(array('id_action' => '3', 'description_action' => 'Tentativa de login com: '.$var['usuario']));
				redirect('admin/login');
			else:
				
				$this->session->unset_userdata('url_anterior'); //remove variável da sessão
				$this->session->set_userdata('login', $var);
				$this->Log_model->salvar(array('id_user_make_action' => $var['id_usuario'], 'id_action' => '1', 'description_action' => 'LOGIN: '.$var['nome'].', acessando o sistema.'));
				
				// continuar logado
				if(@$dados['conectado'] == 'on'){
					$this->config->config['sess_expiration'] = 0;
					$this->config->config['sess_expire_on_close'] = FALSE;
				}
				
				if ($dados['url_anterior'] != '') {
					redirect($dados['url_anterior']);
				}
				else {
					redirect('admin/inicio'); // redireciona p/ o inicio
				}	
			endif;
		}
	}
		
	/**
	 * Validações do login do usuário vindo view
	 * @author Novak
	 */
	private function initValidacao() {
		$this->form_validation->set_rules('txt_email', 'Email', 'required');
		$this->form_validation->set_rules('txt_pass', 'Senha', 'required');
		
		$this->form_validation->set_message('required', 'O campo %s é obrigatório!');
		$this->form_validation->set_error_delimiters('<p>', '</p>');
	}
	
	/**
	 * Logout do sistema
	 * @author Novak
	 */
	public function logout() {
		$datalog = $this->session->userdata('login');
		if(isset($datalog))
			$this->Log_model->salvar(array('id_user_make_action' => $var['id_usuario'], 'id_action' => '2', 'description_action' => 'LOGOUT: '.$datalog['nome'].', saiu do sistema.'));

			$this->session->unset_userdata();
			$this->session->sess_destroy();
			redirect('admin/inicio');
	}
	
	public function acesso_negado() {
		$this->load->view('admin/erro');
	}
}
/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */