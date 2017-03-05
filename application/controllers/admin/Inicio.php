<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends MY_Controller {
	
	function Inicio() {
		parent::__construct(get_class($this));
		$this->site_classmenu = 'avisos';
		$this->load->model('Emails_model');
	}
	
	public function index()	{
		redirect('admin/inicio/avisos');
	}
	
	/**
	 * Função faz o levantamento da agenda padrão
	 * @author Novak
	 */
	public function avisos(){	
		$pagina_atual 	= (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3") == 'primeira' ? 0 : $this->uri->segment("3");
		
		//se quizer que traga mais registros altera a quantidade aqui, pode vir da view se for necessário
		$itens_por_pagina = 20;
		
		$var['num_results'] = $nr_resultados = count($this->Emails_model->listar());
			
		$offset 	= $pagina_atual * $itens_por_pagina;
		$options 	= array(
				'limit' 			=> $itens_por_pagina,
				'offset' 			=> $offset,
				'sortBy' 			=> 'data',
				'sortDirection' 	=> 'desc'
		);
		
		$var['agenda'] 			= $this->Emails_model->listar($options);
		!$var['agenda'] ?  		$var['num_results'] = 0 : '';
		
		// URL da página
		$url = base_url() . "admin/inicio/avisos/";
		$var['paginacao'] = paginacao($url, $pagina_atual, $nr_resultados, $itens_por_pagina);
		
		$this->load->view('admin/avisos', $var);
	}
}
/* End of file inicio.php */
/* Location: ./application/controllers/admin/inicio.php */