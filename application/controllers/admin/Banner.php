<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MY_Controller {
	
	function Banner() {
		parent::__construct(get_class($this));
		$this->site_classmenu = 'banner';
		$this->load->model('Banner_model');
	}
	
	public function index()	{
		$data['banners'] 	= $this->Banner_model->listar();
		
		$this->load->view('admin/banner', $data);
	}
	
	//########## Bloco banner ##########//

	public function uploadBanner() {
		
		$dados = $this->input->post();
		if (isset($dados['titulo'])) $dados['titulo']	= formata_tipo($dados['titulo']);
		if (isset($dados['descricao'])) $dados['descricao']	= formata_tipo($dados['descricao']);

		//em alguns casos precisa da '/'
		$fisico = $_SERVER['DOCUMENT_ROOT'];
		$fisico = substr($fisico, -1) == '/' ? $fisico : $fisico.'/';
	
		//$url = $fisico .'arquivos/banners/';
		$url = './arquivos/banners/';
	
		if(!file_exists($url))
			mkdir($url, 0777, true);
				
			$this->load->library('upload');
	
			$config['upload_path'] = $url;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|dwg|dxf|dwf';
			$config['max_size']	= '21000';
	
			$i = 1;
			foreach($_FILES as $key => $value)	{
	
				if(!empty($key)){
	
					$config['file_name']  = gera_nome_imagem('banner', 'nome');
						
					$this->upload->initialize($config);
						
					if(!$this->upload->do_upload($key)){
	
						$this->session->set_flashdata('erro', $this->upload->display_errors());
	
					}else{
	
						$data = $this->upload->data();
	
						$dados['nome'] = $data['file_name'];
	
						$this->load->library('image_lib');
	
						$this->Banner_model->salvar($dados);
							
						$this->session->set_flashdata('mensagem', 'Banner(s) enviado(s) com sucesso!');
							
						$i++;
					}
				}
					
			}
			//echo phpinfo();
	
			$datalog = $this->session->userdata('login');
			$this->Log_model->salvar(array('id_user_make_action' => $datalog['id_usuario'], 'id_action' => '4', 'description_action' => 'BANNER: O Usuário '.$datalog['nome'].', fez upload da imagem '.$dados['nome'].'.'));
	
			redirect('admin/banner');
	}

	
	public function deletebanner(){
	
		$dados = $this->input->post();

		$this->db->trans_start();
		$this->Banner_model->delete($dados);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_complete();
			$this->session->set_flashdata('erro','ERRO: Ao apagar dados na tabela banner!');
			redirect('admin/banner');
		}
	
		//em alguns casos precisa da '/'
		$fisico = $_SERVER['DOCUMENT_ROOT'];
		$fisico = substr($fisico, -1) == '/' ? $fisico : $fisico.'/';
		
		//$url = $fisico .'arquivos/banners/';
		$url = './arquivos/banners/';
	
	
		@unlink($url. $dados['nome']);
	
		$this->db->trans_complete();
		$this->session->set_flashdata('mensagem', 'banner excluido com sucesso!');
	
		$datalog = $this->session->userdata('login');
		$this->Log_model->salvar(array('id_user_make_action' => $datalog['id_usuario'], 'id_action' => '5', 'description_action' => 'BANNER: O Usuário '.$datalog['nome'].', apagou a imagem '.$dados['nome'].'.'));

		redirect('admin/banner');
	}
	
	public function updatebanner(){
	
		$dados = $this->input->post();
		if (isset($dados['titulo'])) $dados['titulo']	= formata_tipo($dados['titulo']);
		if (isset($dados['descricao'])) $dados['descricao']	= formata_tipo($dados['descricao']);

		$this->db->trans_start();
		$this->Banner_model->salvar($dados, $dados['id_banner']);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_complete();
			$this->session->set_flashdata('erro','ERRO: Ao atualizar dados na tabela banner!');
			redirect('admin/banner');
		}
	
		$this->db->trans_complete();
		$this->session->set_flashdata('mensagem', 'Banner atualizado com sucesso!');
		
		$datalog = $this->session->userdata('login');
		$this->Log_model->salvar(array('id_user_make_action' => $datalog['id_usuario'], 'id_action' => '7', 'description_action' => 'BANNER: O Usuário '.$datalog['nome'].', alterou dados da imagem '.$dados['nome'].'.'));
		
		redirect('admin/banner');		
	}
}
/* End of file banner.php */
/* Location: ./application/controllers/admin/banner.php */