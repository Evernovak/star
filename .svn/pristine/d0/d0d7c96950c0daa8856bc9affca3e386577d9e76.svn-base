<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	/**
	 * Busca os dados no banco conforme veio do login.
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
	public function logar($options) {
		// valores requeridos
		if(!$this->_required(array('usuario','senha'), $options)) return false;
		
		// valores default
		$options = $this->_default(array('status' => 't'), $options);
		
		// Add where clauses to query
		$qualificationArray = array('usuario','senha','status');
		foreach($qualificationArray as $qualifier){
			if((isset($options[$qualifier]))&&($options[$qualifier])) $this->db->where($qualifier, $options[$qualifier]);
		}
		$this->db->select('id_usuario, nome, email, tipo_permissao, descricao');
		
		$query = $this->db->get('logar');
		if($query->num_rows() == 0) return false;
		
		if(isset($options['usuario']) && isset($options['senha']))
			return $query->row(0);
		else
			return $query->result();
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