<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
	
	function Produtos() {
		parent::__construct();

		$this->site_classmenu = 'produtos';
	
		//$this->load->model('bannerModel');
	}

	public function index()
	{
		$this->load->view('produtos');
	}
}
/* End of file Produtos.php */
/* Location: ./application/controllers/Produtos.php */