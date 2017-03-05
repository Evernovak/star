<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  MY_Controller  extends  CI_Controller  {
	
	var $nomecontroller = '';
	var $site_classmenu = '';
	
	/**
	*
	* Controller genérico
	* @author Novak
	* @param string $nomecontroller nome do controller que está estendendo (get_class($this)).
	* 				obs: não informar este parâmetro caso a função não dependa do login.
	*/
	function MY_Controller($nomecontroller = null) {
		parent::__construct();
		
		// área administrativa (requer login)
		if($nomecontroller) {
			$segmento = $this->uri->segment(0) . '/';
			check_login($segmento . $nomecontroller, $this->uri->uri_string());
		}else {
			redirect("home");
		}
	}
}