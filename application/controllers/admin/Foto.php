<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foto extends MY_Controller {
	
	function Foto() {
		parent::__construct(get_class($this));
		$this->site_classmenu = 'foto';
		$this->load->model('Foto_model');
	}
	
	public function index()	{
		$data['fotos'] 	= $this->Foto_model->listar();
		
		$this->load->view('admin/foto', $data);
	}
	
	//########## Bloco foto ##########//

	public function uploadFoto() {
		
		$dados = $this->input->post();
		if (isset($dados['legenda'])) $dados['legenda']	= formata_tipo($dados['legenda']);

		//em alguns casos precisa da '/'
		$fisico = $_SERVER['DOCUMENT_ROOT'];
		$fisico = substr($fisico, -1) == '/' ? $fisico : $fisico.'/';
	
		//$url = $fisico .'arquivos/fotos/';
		$url = './arquivos/fotos/';
	
		if(!file_exists($url))
			mkdir($url, 0777, true);
				
			$this->load->library('upload');
	
			$config['upload_path'] = $url;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|dwg|dxf|dwf';
			$config['max_size']	= '21000';
	
			$i = 1;
			foreach($_FILES as $key => $value)	{
	
				if(!empty($key)){
	
					$config['file_name']  = gera_nome_imagem('foto', 'nome');
						
					$this->upload->initialize($config);
						
					if(!$this->upload->do_upload($key)){
	
						$this->session->set_flashdata('erro', $this->upload->display_errors());
	
					}else{
	
						$data = $this->upload->data();
	
						$dados['nome'] = $data['file_name'];
	
						$this->load->library('image_lib');
	
						$this->Foto_model->salvar($dados);
							
						$this->session->set_flashdata('mensagem', 'Foto(s) enviada(s) com sucesso!');
							
						$i++;
					}
				}
					
			}
			//echo phpinfo();
	
			$datalog = $this->session->userdata('login');
			$this->Log_model->salvar(array('id_user_make_action' => $datalog['id_usuario'], 'id_action' => '4', 'description_action' => 'FOTO: O Usuário '.$datalog['nome'].', fez upload da imagem '.$dados['nome'].'.'));
	
			redirect('admin/foto');
	}

	
	public function deleteFoto(){
	
		$dados = $this->input->post();

		$this->db->trans_start();
		$this->Foto_model->delete($dados);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_complete();
			$this->session->set_flashdata('erro','ERRO: Ao apagar dados na tabela foto!');
			redirect('admin/foto');
		}
	
		//em alguns casos precisa da '/'
		$fisico = $_SERVER['DOCUMENT_ROOT'];
		$fisico = substr($fisico, -1) == '/' ? $fisico : $fisico.'/';
		
		//$url = $fisico .'arquivos/fotos/';
		$url = './arquivos/fotos/';
	
	
		@unlink($url. $dados['nome']);
	
		$this->db->trans_complete();
		$this->session->set_flashdata('mensagem', 'Foto excluida com sucesso!');
	
		$datalog = $this->session->userdata('login');
		$this->Log_model->salvar(array('id_user_make_action' => $datalog['id_usuario'], 'id_action' => '5', 'description_action' => 'FOTO: O Usuário '.$datalog['nome'].', apagou a imagem '.$dados['nome'].'.'));

		redirect('admin/foto');
	}
	
	public function updateFoto(){
	
		$dados = $this->input->post();
		if (isset($dados['legenda'])) $dados['legenda']	= formata_tipo($dados['legenda']);

		$this->db->trans_start();
		$this->Foto_model->salvar($dados, $dados['id_foto']);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_complete();
			$this->session->set_flashdata('erro','ERRO: Ao atualizar dados na tabela foto!');
			redirect('admin/foto');
		}
	
		$this->db->trans_complete();
		$this->session->set_flashdata('mensagem', 'Foto atualizada com sucesso!');
		
		$datalog = $this->session->userdata('login');
		$this->Log_model->salvar(array('id_user_make_action' => $datalog['id_usuario'], 'id_action' => '7', 'description_action' => 'FOTO: O Usuário '.$datalog['nome'].', alterou dados da imagem '.$dados['nome'].'.'));
		
		redirect('admin/foto');		
	}
}
/* End of file foto.php */
/* Location: ./application/controllers/admin/foto.php */