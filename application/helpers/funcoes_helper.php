<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('set_msg')):
	//seta msg via session para ser lida posteriorimente
	function set_msg($msg=NULL){
		$ci = & get_instance();
		$ci->session->set_userdata('aviso', $msg);

	}
endif;

if(!function_exists('get_msg')):
	//retorna uma msg definida pela funcao set_msg
	function get_msg($destroy = TRUE){
		$ci = & get_instance();
		$retorno = $ci->session->userdata('aviso');
		if($destroy) $ci->session->unset_userdata('aviso');
		return $retorno;
	}
endif;

if(!function_exists('verifica_login')):
	//verifica se o usuario esta autenticado, caso nao redireciona a uma outra pagica
	function verifica_login($redirect='usuarios/login'){
		$ci = & get_instance();
		if($ci->session->userdata('acesso')!= TRUE):
			set_msg('Acesso restrito faca o login');
			redirect($redirect, 'refresh');
		endif;
	}
endif;

if(!function_exists('verifica_adm')):
	//verifica se o usuario esta autenticado como administrador, caso nao redireciona a uma outra pagica
	function verifica_adm($redirect='usuarios/login'){
		$ci = & get_instance();
		if( $ci->session->userdata('admin') != TRUE):
			set_msg('Acesso restrito faca o login como administrador');
			redirect($redirect, 'refresh');
		endif;
	}
endif;

if(!function_exists('tempo_sec')):
	//verifica se o usuario esta autenticado como administrador, caso nao redireciona a uma outra pagica
	function tempo_sec($tempo){
		// Separa á hora dos minutos
		$hIni = explode(':', $tempo);
		

		// Converte a hora e minuto para segundos
		$hIni = (60 * 60 * $hIni[0]) + (60 * $hIni[1]);

		return $hIni;
	}
endif;

if(!function_exists('tempo_horas')):
	//verifica se o usuario esta autenticado como administrador, caso nao redireciona a uma outra pagica
	function tempo_horas($tempo){
		// Separa á hora dos minutos
		$temp=$tempo/3600;
		$t = explode('.', $temp);
		$hora=$t[0];
		if ( ! isset($t[1])) {
			$t[1] = null;
		 }

		$min='0.'.$t[1];
		$minutos=$min*60;
		$min= explode('.', $minutos);
		$min=$min[0];
		

		// Converte a hora e minuto para segundos
		

		if ($t[1]=== NULL) {
			if($hora < 9){
				
				$convert= "0".$hora.":00";
				return $convert;
			   
			} else {
				
				$convert= $hora.":00";
				return $convert;
			}
	   } else {
			if($hora < 9){
				
				$convert="0".$hora.":".$min;
				return $convert;
			} else {
				
				$convert=$hora.":".$min;
				return $convert;
			}
	   }

	}
endif;

if(!function_exists('config_upload')):
	function config_upload($path='./uploads/', $types='jpg|png', $size=512){
		$config['upload_path'] = $path;
		$config['allowed_types'] = $types;
		$config['max_size'] = $size;
		return $config;
	}
endif;