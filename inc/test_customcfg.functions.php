<?php
/**
 * Plugin title plugin API
 * @package Plugins/test_customcfg
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2015
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL');

function v1_int($cfg_var, $p1='', $p2=''){
	return cot_config_type_int($cfg_var, $p1, $p2);
}

function v1_int_filter($input_value, $cfg_var, $min='', $max=''){
	return cot_config_type_int_filter($input_value, $cfg_var, $min, $max);
}

function mobtel_input($cfg_var,$prefix){
	$name = $cfg_var['config_name'];
	$value = $cfg_var['config_value'];
	if ($value)
	{
		$mobile_code = substr($value, 0, 3);
		$mobile_num =  substr($value, 3, 7);
		$formatted = $prefix . ' (' .$mobile_code. ') ' . $mobile_num;
	}
	return cot_inputbox('text', $name, $formatted, array('placeholder' => $prefix.' (000) 0000000' ));
}

function mobtel_input_filter(&$input_value, $cfg_var){
	$not_filtered = $input_value;
	$var_name = $cfg_var['config_name'];
	$filtered = preg_replace("/[^\d]/", '', $input_value);
	if (preg_match('/\d{10,11}/', $filtered)){
		return substr($filtered, -10);
	} else {
		cot_error('not_a_number', $var_name);
		$input_value = '';
		return NULL;
	}
}

function cfg_password($cfg_var, $minlength = 4){
	if (!$minlength) $minlength = 4;
	$value = $cfg_var['config_value'];
	$var_name = $cfg_var['config_name'];
	$type = 'password';
	$attr = array('pattern' => '[^\s]{'.$minlength.',}');
	$input_code = cot_inputbox($type, $var_name.'[0]', $value, $attr)
		.' <br>Repeat password to change it:<br>'
		.cot_inputbox($type, $var_name.'[1]', '', $attr);
	return $input_code;
}

function cfg_password_filter(&$input_value, $cfg_var, $minlength = 4){
	if (!is_array($input_value)) return NULL;

	if ($input_value[0] == $input_value[1]) {
		if ($input_value[0] && mb_strlen($input_value[1]) < $minlength) {
			cot_error('min length: '.$minlength, $cfg_var['config_name']);
		}
		else
		{
			return $input_value[1];
		}
	} else {
		if ($input_value[1]) cot_error('Password must match', $cfg_var['config_name']);
	}
	$input_value = $cfg_var['config_value'];
	return NULL;
}

function cot_test_callback(){
	$list = array(
		'x1'=>'title1',
		'x2'=>'title2',
		'x3'=>'title3',
	);
	return $list;
}

