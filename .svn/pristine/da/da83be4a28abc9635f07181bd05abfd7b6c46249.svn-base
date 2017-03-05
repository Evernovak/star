<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * Retorna o dado passado por parâmetro com sua tipagem
 * @author Novak
 * @param $string
 * @return NULL|String|Integer
 */
function formata_tipo($string) {
	//header("Content-Type: text/html; charset=UTF-8", true);
	$string = trim($string);
	
	if(is_numeric($string))
		return (Integer) $string;
	
	return mb_strtoupper($string, 'UTF-8');
}

/**
*
* Limpa os valores para inserção no banco
* @author Novak
* @param $string
* @return Float
*/
function formata_valor($string){
	$valor = preg_replace('/[.]/','',$string);
	return (floatval( preg_replace('/[,]/','.',$valor)));
}

/**
* Insere máscara de valor monetário em um número
* @author Armando Tomazzoni Junior
* @param $string valor a ser mascarado
* @example http://www.revistaphp.com.br/artigo.php?id=21
*/
function formata_moeda ($string) {
	$valor = number_format($string, 2, ',', '.');
	return $valor;
}

/**
* Insere máscara de milhar em um número
* @author Novak
* @param $string valor a ser mascarado
*/
function formata_milhar ($string) {
	$valor = preg_replace('/[,]/','.',number_format($string));
	return $valor;
}


/**
*
* Retorna o campo sem formatação
* @author Armando Tomazzoni Junior
* @param $valor
* @return String|Integer
*/
function remover_formatacao($valor) {
	return preg_replace('/[^0-9]/', '', $valor);
}

/**
 * 
 * Retorna o CEP formatado no formato 00000-000
 * @param $valor
 * @return $valor
 */
function formata_cep($valor) {
	if(!$valor) {
		return false;
	}
	$valor = str_replace(array('.','-'), '' ,  $valor);
	 
	if(strlen($valor) < 8);
	$valor .= 0;

	$a = number_format(substr($valor, 0, 5), 0 , '' , '');
	$b = substr($valor, 5 , 3);
	$valor = $a . "-" . $b;
	return $valor;
}

/**
*
* Retorna o telefone com máscara
* @param $numero
* @param $mascara
* @return $telefone
*/
function formata_telefone($numero, $mascara='(99) 9999-9999') {
	if(!$numero) {
		return false;
	}
	$mascarasp = '(99) 99999-9999'; //mascara padrão sp
	$numero = str_replace(array(' ', '-', '(', ')'), '', $numero);
	$a_num = str_split($numero);
	$a_masc = str_split($mascara);
	
	$tam = count($a_num);//mascara padrão sp
	if($tam == '11')
		$a_masc = str_split($mascarasp); 
	
	$telefone = '';
	$i_num = 0;
	foreach($a_masc as $c){
		if($c != '9')
		$telefone .= $c;
		else{
			$telefone .= @$a_num[$i_num];
			$i_num++;
		}
	}
	return $telefone;
}

/**
*
* Retorna o nome aleatorio do arquivo
* @return $string
*/
function gera_nome_imagem($tabela, $coluna) {
	
	$nome = '';
	for ($i=0; $i<7; $i++) {
		$nome .= chr(rand(97,122));
		$nome .= chr(rand(65,90));
		$nome .= chr(rand(48,57));
	}
	
	$dado = verifica_nome($tabela, $coluna, $nome);
	
	if($dado)
		gera_nome_imagem($tabela, $coluna);
	else
		return $nome;
}

/**
 *
 * verefica o nome se já existe arquivo
 * @return $array
 */
function verifica_nome($tabela, $coluna, $arquivo) {
	$CI =& get_instance();
	$CI->load->model('Foto_model');

	$data = $CI->Foto_model-> verificar_nome_arquivo($tabela, $coluna, $arquivo);

	return $data;
}

/**
*
* Retorna o dado passado por parâmetro com sua tipagem
* @author Luiz Rafael Schmitke
* @param $data
* @param $saida = BR
* @return String
*/
function formata_data($data, $saida = 'BR') {
	if($data) {
		if($saida == 'BR'){
			$date = new DateTime(@$data);
			return $date->format('d/m/Y');
		}else if($saida == 'US'){
			$date = explode('/', $data);
			return $date[2].'-'.$date[1].'-'.$date[0];
		}
	}
}

/**
* Verifica se a data é válida (formato US)
* @author Novak
* @param $mydate
* @return True / False
*/
function check_data($mydate) {
      
    list($yy,$mm,$dd)=explode("-",$mydate);
    if (is_numeric($yy) && is_numeric($mm) && is_numeric($dd))
    {
        return checkdate($mm,$dd,$yy);
    }
    return false;           
} 

function saudacao() {
	$hr = date(" H ");
	if($hr >= 12 && $hr<18) {
		$resp = "Boa tarde";
	}
	else if ($hr >= 0 && $hr <12 ){
		$resp = "Bom dia";
	}
	else {
		$resp = "Boa noite";
	}
	return $resp;
}

/**
 * Retorna uma string no formato camelCase (primeiras letras maiúsculas)
 * @author Armando Tomazzoni Junior
 * @param unknown_type $string
 */
function camelCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("de", "da", "dos", "das", "do", "I", "II", "III", "IV", "V", "VI")){
	/*
	* Exceptions in lower case are words you don't want converted
	* Exceptions all in upper case are any words you don't want converted to title case
	*   but should be converted to upper case, e.g.:
	*   king henry viii or king henry Viii should be King Henry VIII
	*/
	$string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
	foreach ($delimiters as $dlnr => $delimiter) {
		$words = explode($delimiter, $string);
		$newwords = array();
		foreach ($words as $wordnr => $word) {
			if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
				// check exceptions list for any words that should be in upper case
				$word = mb_strtoupper($word, "UTF-8");
			} elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
				// check exceptions list for any words that should be in upper case
				$word = mb_strtolower($word, "UTF-8");
			} elseif (!in_array($word, $exceptions)) {
				// convert to uppercase (non-utf8 only)
				$word = ucfirst($word);
			}
			array_push($newwords, $word);
		}
		$string = join($delimiter, $newwords);
	}//foreach
	return $string;
}

/**
 * Retorna um texto no com a primeira maiúscula
 * @author Novak
 * @param unknown_type $string
 */
function capitalize($string) {
	setlocale(LC_CTYPE,"pt_BR");
	$fc = mb_strtoupper(mb_substr($string, 0, 1));
    return $fc.mb_strtolower(mb_substr($string, 1));
}

/**
 * Retorna um texto maiúscula
 * @author Novak
 * @param unknown_type $string
 */
function lowercase($string) {
	setlocale(LC_CTYPE,"pt_BR");
	return strtolower(utf8_decode($string));
}


/**
* Retorna uma string com o mês referente
* @author Novak
* @param $mes(em numero)
*/
function retorna_data_extenso($mes){

	switch ($mes) {
		case '01':
			return 'Janeiro';
			break;
		case '02':
			return 'Fevereiro';
			break;
		case '03':
			return 'Março';
			break;
		case '04':
			return 'Abril';
			break;
		case '05':
			return 'Maio';
			break;
		case '06':
			return 'Junho';
			break;
		case '07':
			return 'Julho';
			break;
		case '08':
			return 'Agosto';
			break;
		case '09':
			return 'Setembro';
			break;
		case '10':
			return 'Outubro';
			break;
		case '11':
			return 'Novembro';
			break;
		case '12':
			return 'Dezembro';
			break;
	}
}

/**
* Converte para HH:MM
* @author Armando Tomazzoni Junior
*/
function formataHora($valor) {
	return substr($valor, 0, 5);
}

/**
* Formata cpf ou cnpj
* @author Novak
*/
function formata_CPFCNPJ ($string){
	$output = preg_replace("[' '-./ t]", '', $string);
	$size = (strlen($output) -2);
	if ($size != 9 && $size != 12) return false;
	$mask = ($size == 9)
	? '###.###.###-##'
	: '##.###.###/####-##';
	$index = -1;
	for ($i=0; $i < strlen($mask); $i++):
	if ($mask[$i]=='#') $mask[$i] = $output[++$index];
	endfor;
	return $mask;
}

/**
 * Remove caracteres especiais e acentuação da palavra
 * @param $palavra
 * @return string
 */
function remover_caracteres_especiais($palavra) {
	return preg_replace('/[^a-zA-Z0-9_ -%][().][\/]/s', '', $palavra);
}

function remover_caracteres_especiais2($str) {
	return strtr(utf8_decode($str),utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');

}

function primeira_palavra($palavra) {
	return current(str_word_count($palavra, 2 ));
}

/**
 * Monta a paginação para a views
 * @param $url, $pagina_atual, $nr_resultados, $itens_por_pagina(limit)
 * @return string
 */
function paginacao($url, $pagina_atual, $nr_resultados, $itens_por_pagina) {
	// Total de dados retornados (Quantidade Geral)
	$nr_paginas 	= ceil($nr_resultados / $itens_por_pagina);
	
	$pagina_inicio 	= $pagina_atual - 5;
	$pagina_final 	= $pagina_atual + 6;
	
	if($pagina_inicio <= 0)
		$pagina_inicio = 1;
	
	if($pagina_final > $nr_paginas)
		$pagina_final = $nr_paginas;
	
	$link = '';
	if($nr_resultados > $itens_por_pagina){
		// ñ exibe botão anterior caso esteja na 1a pagina
		if($pagina_atual > 0) :
			$pagina = ($pagina_atual-1) > 0 ?  ($pagina_atual-1) : 'primeira' ;
			$link	.= "<a href='$url$pagina' class='btn-cinza'>&laquo; ANTERIOR</a>";
		endif;
	
		for($i = $pagina_inicio; $i <= $pagina_atual; $i++) {
			if($i == $pagina_atual) :
				$link.= "&nbsp;<span class='pagina-atual'>$i</span>";
			else :
				$link.= "&nbsp;<a href='$url$i' class='btn-cinza'>$i</a>";
			endif;
		}
	
		for($i = ($pagina_atual+1); $i < $pagina_final; $i++) {
			$link.= "&nbsp;<a href='$url$i' class='btn-cinza'>$i</a>";
		}
	
		// ñ exibe botão proximo caso esteja na ultima pagina
		if($pagina_atual < $nr_paginas) :
			$pagina = $pagina_atual+1;
			$link	.= "&nbsp;<a href='$url$pagina' class='btn-cinza'>PRÓXIMO &raquo;</a>";
		endif;
	}
	
	return $link;
}