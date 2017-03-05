<?php
class Banner_model extends CI_Model {
	
	/**
	 * Busca padrão de banners
	 * @param $options array()
	 * @author Novak
	 */
	function listar($options = array()){

		// Add where clauses to query
		$qualificationArray = array('id_banner','nome');
		foreach($qualificationArray as $qualifier){
			if((isset($options[$qualifier]))&&($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
		}
	
		// If limit / offset para a paginação
		if(isset($options['limit']) && isset($options['offset'])) $this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit'])) $this->db->limit($options['limit']);
	
		// sort
		if(isset($options['sortBy'])) $this->db->order_by($options['sortBy'], $options['sortDirection']);
	
		$query = $this->db->get('banner');
		if($query->num_rows() == 0) return false;
	
		if(isset($options['id_banner']) && isset($options['nome']))
			return $query->row(0);
			else
				return $query->result();
	}
	
	/**
	 * salvar method update a record in the banner table.
	 *
	 * Option: Values
	 * --------------
	 * id_banner
	 * nome
	 * titulo
	 * descricao
	 * data
	 * @param array $options
	 */
	function salvar($options, $id_banner = NULL) {
		
		// valores requeridos
		if(!$this->_required(array('nome'), $options)) return false;
	
		// qualificação (certifique-se de que não está permitindo que inserira dados que não deveria)
		$qualificationArray = array('nome','titulo','descricao');
		foreach($qualificationArray as $qualifier){
			if(isset($options[$qualifier])) $this->db->set($qualifier, trim($options[$qualifier]));
		}
		if ($id_banner == NULL) {
			// valores default
			$this->db->set('data', date('Y-m-d H:i:s'));
			$this->db->insert('banner');
			return $this->db->insert_id();
			
		}else{
			$this->db->where('id_banner', $id_banner);
			$this->db->update('banner');
		
			return ($this->db->affected_rows() > 0) ? $id_banner : false;
		}
	}
	
	
	/**
	 * Função genérica que apaga o arquivo
	 * @param $options
	 * @author Novak
	 */
	function delete($options){
		// valores requeridos
		if(!$this->_required(array('id_banner'), $options)) return false;
		
		// Add where clauses to query
		$qualificationArray = array('id_banner');
		foreach($qualificationArray as $qualifier){
			if((isset($options[$qualifier]))&&($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
		}

		return $this->db->delete('banner');
	}
		
	/*################################  funções padrões  ######################*/
	
	/**
	 * _required método retorna false se o array $data não contém todas as chaves atribuídas pelo array $required.
	 *
	 * @param array $required
	 * @param array $data
	 * @return bool
	 */
	function _required($required, $data){
		foreach($required as $field) if(!isset($data[$field])) return false;
		return true;
	}
	
	/**
	 * _default método combina o array de opções com um conjunto de padrões que dão os valores no array de opções de prioridade.
	 *
	 * @param array $defaults
	 * @param array $options
	 * @return array
	 */
	function _default($defaults, $options){
		return array_merge($defaults, $options);
	}
}