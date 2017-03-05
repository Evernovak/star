<?php
class Emails_model extends CI_Model {
	
	/**
	 * Busca padrão de emails
	 * @param $options array()
	 * @author Novak
	 */
	function listar($options = array()){

		// Add where clauses to query
		$qualificationArray = array('id_email','nome','email','telefone','assunto','mensagem','data');
		foreach($qualificationArray as $qualifier){
			if((isset($options[$qualifier]))&&($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
		}
		// Add where clauses to query
		$qualificationArray = array('id_email');
		foreach($qualificationArray as $qualifier){
			if((isset($options[$qualifier]))&&($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
		}
		
		// Add clausulas where 'ILIKE' para a query
		$qualificationArray = array('nome','email','assunto','mensagem');
		foreach($qualificationArray as $qualifier){
			if(isset($options[$qualifier])&&($options[$qualifier])) $this->db->where("sem_acentos(".$qualifier.") ILIKE sem_acentos('%".$this->db->escape_like_str($options[$qualifier])."%')");
		}
		
		// Add clausulas where 'LIKE' para a query
		$qualificationArray = array('telefone');
		foreach($qualificationArray as $qualifier){
			if(isset($options[$qualifier])) $this->db->like($qualifier, remover_formatacao($options[$qualifier]));
		}
	
		// If limit / offset para a paginação
		if(isset($options['limit']) && isset($options['offset'])) $this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit'])) $this->db->limit($options['limit']);
	
		// sort
		if(isset($options['sortBy'])) $this->db->order_by($options['sortBy'], $options['sortDirection']);
	
		$query = $this->db->get('emails');
		if($query->num_rows() == 0) return false;
	
		if(isset($options['id_email']) && isset($options['nome']))
			return $query->row(0);
			else
				return $query->result();
	}
	
	/**
	 * salvar method update a record in the email table.
	 *
	 * Option: Values
	 * --------------
	 * id_email
	 * nome
	 * email
	 * telefone
	 * assunto
	 * mensagem
	 * data
	 * @param array $options
	 */
	function salvar($options, $id_email = NULL) {
		
		// valores requeridos
		if(!$this->_required(array('nome','telefone'), $options)) return false;
	
		// qualificação (certifique-se de que não está permitindo que inserira dados que não deveria)
		$qualificationArray = array('id_email','nome','email','telefone','assunto','mensagem','data');
		foreach($qualificationArray as $qualifier){
			if(isset($options[$qualifier])) $this->db->set($qualifier, trim($options[$qualifier]));
		}
		if ($id_email == NULL) {
			// valores default
			$this->db->set('data', date('Y-m-d H:i:s'));
			$this->db->insert('emails');
			return $this->db->insert_id();
			
		}else{
			$this->db->where('id_email', $id_email);
			$this->db->update('emails');
		
			return ($this->db->affected_rows() > 0) ? $id_email : false;
		}
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