<?php
class Foto_model extends CI_Model {
	
	/**
	 * Busca padrão de fotos
	 * @param $options array()
	 * @author Novak
	 */
	function listar($options = array()){

		// Add where clauses to query
		$qualificationArray = array('id_foto','nome');
		foreach($qualificationArray as $qualifier){
			if((isset($options[$qualifier]))&&($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
		}
	
		// If limit / offset para a paginação
		if(isset($options['limit']) && isset($options['offset'])) $this->db->limit($options['limit'], $options['offset']);
		else if(isset($options['limit'])) $this->db->limit($options['limit']);
	
		// sort
		if(isset($options['sortBy'])) $this->db->order_by($options['sortBy'], $options['sortDirection']);
	
		$query = $this->db->get('foto');
		if($query->num_rows() == 0) return false;
	
		if(isset($options['id_foto']) && isset($options['nome']))
			return $query->row(0);
			else
				return $query->result();
	}
	
	/**
	 * salvar method update a record in the foto table.
	 *
	 * Option: Values
	 * --------------
	 * id_foto
	 * nome
	 * legenda
	 * data
	 * @param array $options
	 */
	function salvar($options, $id_foto = NULL) {
		
		// valores requeridos
		if(!$this->_required(array('nome'), $options)) return false;
	
		// qualificação (certifique-se de que não está permitindo que inserira dados que não deveria)
		$qualificationArray = array('nome','legenda');
		foreach($qualificationArray as $qualifier){
			if(isset($options[$qualifier])) $this->db->set($qualifier, trim($options[$qualifier]));
		}
		if ($id_foto == NULL) {
			// valores default
			$this->db->set('data', date('Y-m-d H:i:s'));
			$this->db->insert('foto');
			return $this->db->insert_id();
			
		}else{
			$this->db->where('id_foto', $id_foto);
			$this->db->update('foto');
		
			return ($this->db->affected_rows() > 0) ? $id_foto : false;
		}
	}
	
	/**
	 * Função genérica que verifica se já existe este nome do arquivo
	 * para evitar erros na hora do upload
	 * @param $tabela, $coluna, $arquivo
	 * @author Novak
	 */
	function verificar_nome_arquivo($tabela, $coluna, $arquivo){
		$this->db->where($coluna, $arquivo);
		$this->db->from($tabela);
		$query = $this->db->get();
	
		return ($query->num_rows > 0) ? $query->row() : false;
	}
	
	/**
	 * Função genérica que apaga o arquivo
	 * @param $options
	 * @author Novak
	 */
	function delete($options){
		// valores requeridos
		if(!$this->_required(array('id_foto'), $options)) return false;
		
		// Add where clauses to query
		$qualificationArray = array('id_foto');
		foreach($qualificationArray as $qualifier){
			if((isset($options[$qualifier]))&&($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
		}

		return $this->db->delete('foto');
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