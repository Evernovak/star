<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_login')) {
	
	/**
	 * Valida login do usuário
	 * @author Novak
	 */
	function check_login($nomecontroller, $url_anterior = null) {
		$CI =& get_instance();
		$login = $CI->session->userdata('login');
		
	/*	echo "<pre>";
		var_dump($login);
		echo "<pre>";die();*/
		
		//se a sessão estiver vazia manda ´pra tela de login
		if(empty($login)) :
			$CI->session->set_userdata('url_anterior', $url_anterior);
			redirect('admin/login');
		
		 else :
		 	//se não tiver permissão vai para tela acesso negado!
			if(!possui_permissao($nomecontroller, $login))
				redirect('admin/login/acesso_negado');
		endif;
	}
	
	/**
	 * Função que define as permissões do usuário por módulo (controller);
	 * @author Novak
	 */
	function possui_permissao($controller,$sessao) {
		
		$permissoes = array();
		
		/* definição da lista de permissões */
		$permissoes['/Inicio'] 	= array("administrador", "star");
		$permissoes['/Foto'] 	= array("administrador", "star");
		$permissoes['/Banner'] 	= array("administrador", "star");
		
		/* fim definição da lista de permissões */
		foreach ($permissoes[$controller] as $permissao) {
			if($permissao == $sessao['tipo_permissao'])
				return true;
		}
		return false;
	}
}