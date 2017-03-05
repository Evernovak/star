<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thumbs extends CI_Controller {
	
	function Thumbs() {
		parent::__construct();
		$this->load->library('image_lib');
	}

	public function products($width, $height, $img){
		// Checa se a imagem existe; se não existir, usa uma imagem padrão	
		$url = './arquivos/fotos/'. $img;
		
	/*	echo "<pre>";
		var_dump($url);
		echo "</pre>";die();*/
		
		if(!is_file($url)):
			echo "Imagem não encontrada!";
		endif;
		
		// Se a miniatura já existir, ela é que será usada
		if (!is_file('./arquivos/fotos/thumbs/' . $width . 'x' . $height . '_' . $img)){
			
			if(!file_exists('./arquivos/fotos/thumbs/'))
				@mkdir('./arquivos/fotos/thumbs/', 0777, true);
			
			$config['source_image'] = $url;
			$config['new_image'] 	= './arquivos/fotos/thumbs/' . $width . 'x' . $height . '_' . $img;
			$config['width']  		= $width;
			$config['height']   	= $height;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		}
		
		@header('Content-Type: image/jpg');
		@readfile('./arquivos/fotos/thumbs/' . $width . 'x' . $height . '_' . $img);
	}
}


