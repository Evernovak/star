<?php
class LogModel extends CI_Model {
	
	/**
	 * salvarPessoa method update a record in the Pessoa table.
	 *
	 * Option: Values
	 * --------------
	 * id_user_make_action
	 * id_action
	 * description_action
	 * data
	 * id_related
	 * @param array $options
	 */
	function salvar($options) {
		// valores requeridos
		if(!$this->_required(array('id_action','description_action'), $options)) return false;
		
		// valores default
		$options = $this->_default(array('data' => date('Y-m-d H:i:s')), $options);
	
		// qualificação (certifique-se de que não está permitindo que inserira dados que não deveria)
		$qualificationArray = array('id_user_make_action','id_action','description_action','data','id_related');
		foreach($qualificationArray as $qualifier){
			if(isset($options[$qualifier])) $this->db->set($qualifier, trim($options[$qualifier]));
		}
		$this->db->insert('log_action');
		return $this->db->insert_id();
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