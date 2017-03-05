<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {
	
	function Empresa() {
		parent::__construct();

		$this->site_classmenu = 'empresa';
	
		//$this->load->model('bannerModel');
	}

	public function index()
	{
		$this->load->view('empresa');
	}
}
/* End of file Empresa.php */
/* Location: ./application/controllers/Empresa.php */