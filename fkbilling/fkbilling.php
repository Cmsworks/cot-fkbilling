<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=standalone
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
defined('COT_CODE') && defined('COT_PLUG') or die('Wrong URL');

require_once cot_incfile('fkbilling', 'plug');
require_once cot_incfile('payments', 'module');

$m = cot_import('m', 'G', 'ALP');
$pid = cot_import('pid', 'G', 'INT');

if (empty($m))
{
	// Получаем информацию о заказе
	if (!empty($pid) && $pinfo = cot_payments_payinfo($pid))
	{

		cot_block($pinfo['pay_status'] == 'new' || $pinfo['pay_status'] == 'process');

		$url = 'http://www.free-kassa.ru/merchant/cash.php';
		
		$mrh_id = $cfg['plugin']['fkbilling']['mrh_id'];
		$mrh_secret1 = $cfg['plugin']['fkbilling']['mrh_secret1'];
		$mrh_curr = $cfg['plugin']['fkbilling']['mrh_curr'];
		$order_id = $pid;
		$order_amount = $pinfo['pay_summ']*$cfg['plugin']['fkbilling']['rate'];
		$us_item = (!empty($pinfo['pay_code'])) ? $pinfo['pay_area'].'_'.$pinfo['pay_code'] : $pinfo['pay_area'];
		$inv_desc = $pinfo['pay_desc'];
		$lang = $usr['lang'];

		$sign = md5($mrh_id.':'.$order_amount.':'.$mrh_secret1.':'.$order_id);

		$post_opt = "m=" . $mrh_id . "&oa=" . $order_amount . "&o=" . $order_id . "&s=" . $sign . "&us_item=" . $us_item . "&i=" . $mrh_curr . "&lang=" . $lang;

		cot_payments_updatestatus($pid, 'process'); // Изменяем статус "в процессе оплаты"

		header('Location: ' . $url . '?' . $post_opt);
		exit;
	}
	else
	{
		cot_die();
	}
}
elseif ($m == 'success')
{
	$mrh_id = $cfg['plugin']['fkbilling']['mrh_id'];
	$mrh_secret2 = $cfg['plugin']['fkbilling']['mrh_secret2'];

	$sign = md5($mrh_id.':'.$_REQUEST['AMOUNT'].':'.$mrh_secret2.':'.$_REQUEST['MERCHANT_ORDER_ID']);
	if($sign != $_REQUEST['SIGN']){
		$plugin_body = $L['fkbilling_error_incorrect'];
	}
	else{
		$pinfo = cot_payments_payinfo($_REQUEST['MERCHANT_ORDER_ID']);
		if ($pinfo['pay_status'] == 'done')
		{
			$plugin_body = $L['fkbilling_error_done'];
			$redirect = $pinfo['pay_redirect'];
		}
		elseif ($pinfo['pay_status'] == 'paid')
		{
			$plugin_body = $L['fkbilling_error_paid'];
		}
	}

	$t->assign(array(
		"FK_TITLE" => $L['fkbilling_error_title'],
		"FK_ERROR" => $plugin_body
	));
	
	if($redirect){
		$t->assign(array(
			"FK_REDIRECT_TEXT" => sprintf($L['fkbilling_redirect_text'], $redirect),
			"FK_REDIRECT_URL" => $redirect,
		));
	}
	$t->parse("MAIN.ERROR");
}
elseif ($m == 'fail')
{
	$t->assign(array(
		"FK_TITLE" => $L['fkbilling_error_title'],
		"FK_ERROR" => $L['fkbilling_error_fail']
	));
	$t->parse("MAIN.ERROR");
}
?>