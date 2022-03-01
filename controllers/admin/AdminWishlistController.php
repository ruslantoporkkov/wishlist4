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
class AdminWishlistController extends ModuleAdminController
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function init()
	{
		parent::init();
		$this->bootstrap = true;
	}
	
	public function initContent()
	{
		
		parent::initContent();
		$template_file = 'module:blockwishlist4/views/templates/admin/wishlist/wishlist.tpl';
		$content = $this->context->smarty->fetch($template_file);
		$db = Db::getInstance();
		$request = 'SELECT * FROM `' . _DB_PREFIX_ . 'wishlist_table`';
        $wishlist_result = $db->executeS($request);
		$wishlistres = 5;
		$this->context->smarty->assign([
			'context' => $this->context->controller->php_self,
			'wishlist_result' => $wishlist_result,
		]);
		$this->setTemplate('wishlist.tpl');
		
	}
	
}