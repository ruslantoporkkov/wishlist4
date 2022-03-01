<?php
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
// if (!defined('_PS_VERSION_')) {
    // exit;
// }

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

$customer_id_front_for_db = Tools::getValue('customer_id_front');
$product_id_front_for_db = Tools::getValue('product_id_front');


$db = Db::getInstance();
$result = $db->insert('wishlist_table', [
    'customer_wishlist' => (int)$customer_id_front_for_db,
    'product_wishlist' => (int)$product_id_front_for_db,
]);

// $catalog_id_front = Tools::getValue('catalog_id_front');

// if($catalog_id_front){
	// echo $login_or_not = Context::getContext()->customer->isLogged();
	// //echo 'catalog';
// }
// else{
	// echo $result;
// }
// //

echo $result;



