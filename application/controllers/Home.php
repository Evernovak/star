<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function Home() {
		parent::__construct();

		$this->site_classmenu = 'home';
		$this->load->model('Foto_model');
		$this->load->model('Banner_model');
	}

	public function index(){
		$data['fotos'] 		= $this->Foto_model->listar();
		$data['banners'] 	= $this->Banner_model->listar();
		
		$this->load->view('home', $data);
	}
}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */