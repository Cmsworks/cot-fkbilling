<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=ajax
 * [END_COT_EXT]
 */

/**
 * Free-kassa billing Plugin
 *
 * @package fkbilling
 * @version 1.0
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('payments', 'module');

$mrh_id = $cfg['plugin']['fkbilling']['mrh_id'];
$mrh_secret2 = $cfg['plugin']['fkbilling']['mrh_secret2'];

function getIP(){
	if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
	return $_SERVER['REMOTE_ADDR'];
}

if(!in_array(getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189'))){
    echo "hacking attempt!";
	exit();
}

$sign = md5($mrh_id.':'.$_REQUEST['AMOUNT'].':'.$mrh_secret2.':'.$_REQUEST['MERCHANT_ORDER_ID']);
if($sign != $_REQUEST['SIGN']){
    echo "wrong sign";
	exit();
}

$pinfo = cot_payments_payinfo($_REQUEST['MERCHANT_ORDER_ID']);
if(is_array($pinfo) && $pinfo['pay_status'] == 'process'){
	if (cot_payments_updatestatus($_REQUEST['MERCHANT_ORDER_ID'], 'paid')){
		echo "YES";
		exit();
	}
}