<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=payments.billing.register
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
defined('COT_CODE') or die('Wrong URL.');

$cot_billings['Free-kassa'] = array(
	'plug' => 'fkbilling',
	'title' => 'Free-kassa',
	'icon' => $cfg['plugins_dir'] . '/fkbilling/images/freekassa.png'
);
?>