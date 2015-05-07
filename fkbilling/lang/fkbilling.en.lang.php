<?php
/**
 * fkbilling plugin
 *
 * @package fkbilling
 * @version 1.0
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

/**
 * Plugin Config
 */
$L['cfg_mrh_login'] = array('Your ID in Free-kassa.ru');
$L['cfg_mrh_pass1'] = array('Secret word #1  in Free-kassa.ru');
$L['cfg_mrh_pass2'] = array('Secret word #2 in Free-kassa.ru');
$L['cfg_mrh_curr'] = array('Currency');
$L['cfg_rate'] = array('Exchange rate');

$L['fkbilling_title'] = 'Free-kassa';

$L['fkbilling_error_paid'] = 'Payment was successful. In the near future the service will be activated!';
$L['fkbilling_error_done'] = 'Payment was successful.';
$L['fkbilling_error_incorrect'] = 'The signature is incorrect!';
$L['fkbilling_error_otkaz'] = 'Failure to pay.';
$L['fkbilling_error_title'] = 'Result of the operation of payment';
$L['fkbilling_error_fail'] = 'Payment is not made! Please try again. If the problem persists, contact your site administrator';

$L['fkbilling_redirect_text'] = 'Now will redirect to the page of the paid services. If it does not, click <a href="%1$s">here</a>.';