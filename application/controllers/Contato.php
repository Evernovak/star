<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Contato extends CI_Controller {
	function Contato() {
		parent::__construct ();
		
		$this->site_classmenu = 'contato';
		$this->load->model ( 'Emails_model' );
	}
	public function index() {
		$this->load->view ( 'contato' );
	}
	public function enviarEmail() {
		$dados = $this->input->post ();
		
		if (isset ( $dados ['nome'] ))
			$dados ['nome'] = formata_tipo ( $dados ['nome'] );
		if (isset ( $dados ['assunto'] ))
			$dados ['assunto'] = formata_tipo ( $dados ['assunto'] );
		if (isset ( $dados ['mensagem'] ))
			$dados ['mensagem'] = formata_tipo ( $dados ['mensagem'] );
		if (isset ( $dados ['telefone'] ))
			$dados ['telefone'] = remover_formatacao ( $dados ['telefone'] );
		
		$this->Emails_model->salvar ( $dados );
		
		$dados ['corretor'] = new stdClass ();
		$dados ['corretor']->nome = 'Sistema Star Painéis';
		$dados ['corretor']->fone = '4232237774';
		$dados ['corretor']->email = 'sistema@starpaineis.com.br';
		$dados ['texto'] = 'Email enviado da página de <strong>Contato</strong> do Site da Star Painéis Comunicação Visual.';
		$dados ['texto1'] = 'Segue mensagem abaixo:';
		$dados ['texto2'] = 'Assim que possível entraremos em contato com você.';
		
		// $this->load->view('default/email/default', $dados);
		
		$mensagem = $this->load->view ( 'default/email/default', $dados, TRUE );
		
		$titulo = $dados ['assunto'];
		
		$this->load->library ( 'email' );
		
		$this->email->clear ();
		
		$this->email->from ( 'sistema@starpaineis.com.br', 'Star Painéis' );
		$this->email->to ( 'comercial01@starpaineis.com.br' );
		$this->email->cc ( strtolower ( $dados ['email'] ) );
		$this->email->subject ( $titulo );
		$this->email->message ( $mensagem );
		
		if (! $this->email->send ()) {
			$this->session->set_flashdata ( 'erro', 'ERRO: Não foi possível enviar sua mensagem, favor tente mais tarde!' );
		} else {
			$this->session->set_flashdata ( 'mensagem', 'Mensagem enviado com sucesso!' );
		}
		
		redirect ( 'contato' );
	}
}
/* End of file Contato.php */
/* Location: ./application/controllers/Contato.php */