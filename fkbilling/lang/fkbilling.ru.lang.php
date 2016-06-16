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
$L['cfg_mrh_login'] = array('Ваш ID на Fre-kassa.ru');
$L['cfg_mrh_pass1'] = array('Секретное слово #1 на Free-kassa.ru');
$L['cfg_mrh_pass2'] =  array('Секретное слово #2 на Free-kassa.ru');
$L['cfg_mrh_curr'] = array('Идентификатор валюты');
$L['cfg_rate'] = array('Соотношение суммы к валюте сайта');

$L['fkbilling_title'] = 'Free-kassa';

$L['fkbilling_error_paid'] = 'Оплата прошла успешно. В ближайшее время услуга будет активирована!';
$L['fkbilling_error_done'] = 'Оплата прошла успешно.';
$L['fkbilling_error_incorrect'] = 'Некорректная подпись';
$L['fkbilling_error_otkaz'] = 'Отказ от оплаты.';
$L['fkbilling_error_title'] = 'Результат операции оплаты';
$L['fkbilling_error_fail'] = 'Оплата не произведена! Пожалуйста, повторите попытку. Если ошибка повторится, обратитесь к администратору сайта';

$L['fkbilling_redirect_text'] = 'Сейчас произойдет редирект на страницу оплаченной услуги. Если этого не произошло, перейдите по <a href="%1$s">ссылке</a>.';
