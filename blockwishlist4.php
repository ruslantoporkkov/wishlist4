<?php


// if (!defined('_PS_VERSION_')) {
    // exit;
// }



class BlockWishList4 extends Module
{

    public function __construct()
    {
        $this->name = 'blockwishlist4';
        $this->tab = 'front_office_features';
        $this->version = '2.0.1';
        $this->author = 'PrestaShop';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->trans('Wishlist4', [], 'Modules.Blockwishlist4.Admin');
        $this->description = $this->trans('Adds a block containing the customer\'s wishlists.', [], 'Modules.Blockwishlist4.Admin');
        $this->ps_versions_compliancy = [
            'min' => '1.7.6.0',
            'max' => _PS_VERSION_,
        ];
    }


	
	public function install()
	{
		
		$tab_id = Tab::getIdFromClassName('AdminWishlist');
		$languages = Language::getLanguages(false);

		if ($tab_id == false)
		{
			$tab = new Tab();
			$tab->class_name = 'AdminWishlist';
			$tab->position = 3;
			$tabParentName = 'SELL';
			if ($tabParentName)
			{
				$tab->id_parent = (int) Tab::getIdFromClassName($tabParentName);
			} else 
			{
				$tab->id_parent = 0;
			}
			$tab->module = $this->name;
			foreach ($languages as $language) {
				$tab->name[$language['id_lang']] = "Lovely Module";
			}
			$res = $tab->add();
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		return parent::install()
		&& $this->registerHook('actionFrontControllerSetMedia')
		&& $this->registerHook('displayProductActions')
		&& $this->registerHook('displayHeader')
		&& $this->registerHook('actionAdminControllerSetMedia')
		&& $this->registerHook('displayProductListReviews');
		

		
		

		
		
		
		
		
	}

	public function uninstall()
	{
		return parent::uninstall();
	}
	

	
	
	public function createTabLink()
	{
		
	}
	
	
	
	
	

    public function hookActionFrontControllerSetMedia(array $params)
    {
        $productsTagged = true === $this->context->customer->isLogged()
            ? WishList::getAllProductByCustomer($this->context->customer->id, $this->context->shop->id)
            : false;

        Media::addJsDef([
            'blockwishlistController' => $this->context->link->getModuleLink(
                $this->name,
                'action'
            ),
            'removeFromWishlistUrl' => $this->context->link->getModuleLink('blockwishlist', 'action', ['action' => 'deleteProductFromWishlist']),
            'wishlistUrl' => $this->context->link->getModuleLink('blockwishlist', 'view'),
            'wishlistAddProductToCartUrl' => $this->context->link->getModuleLink('blockwishlist', 'action', ['action' => 'addProductToCart']),
            'productsAlreadyTagged' => $productsTagged ?: [],
        ]);

       
		
		$this->context->controller->registerStylesheet(
            'blockwishlist_4_2_style',
            'modules/' . $this->name . '/public/bootstrap.min.css',
            [
              'media' => 'all',
              'priority' => 100,
            ]
        );
		
		
		$this->context->controller->registerStylesheet(
            'blockwishlist_4_1_style',
            'modules/' . $this->name . '/public/wishlist.css',
            [
              'media' => 'all',
              'priority' => 200,
            ]
        );
		
		
        $this->context->controller->registerJavascript(
            'blockwishlistController2',
            'modules/' . $this->name . '/public/product.bundle.js',
            [
              'priority' => 100,
            ]
        );
		
		
		$this->context->controller->registerJavascript(
            'blockwishlistController',
            'modules/' . $this->name . '/public/bootstrap.min.js',
            [
              'priority' => 200,
            ]
        );
		
		
		
    }

    /**
     * This hook allow additional action button, near the add to cart button on the product page
     *
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayProductActions(array $params)
    {
		
		$really_customer_id = $this->context->customer->id;
		$login_or_not = $this->context->customer->isLogged();
		$idprodcurr = (int)Tools::getValue('id_product');
		$host_url_for_template_2 = $_SERVER['HTTP_HOST'];
        $this->smarty->assign([
		  'host_url_for_template_2' => $host_url_for_template_2,
		  'idprodcurr' => $idprodcurr,
		  'login_or_not' => $login_or_not,
		  'really_customer_id' => $really_customer_id,
        ]);

        return $this->fetch('module:blockwishlist4/views/templates/hook/product/add-button.tpl');
    }

   


	
	
	public function hookActionAdminControllerSetMedia(array $params)
    {
        $this->context->controller->addCss($this->getPathUri() . 'public/backoffice.css');
    }
	
	
	

	
	public function hookDisplayProductListReviews(array $params)
	{
		$really_customer_id = $this->context->customer->id;
		$login_or_not = $this->context->customer->isLogged();
		$idprodcurr = (int)Tools::getValue('id_product');
		$host_url_for_template = $_SERVER['HTTP_HOST']; 
        $this->smarty->assign([
			//'idprodcurr' => $idprodcurr,
			'host_url_for_template' => $host_url_for_template,
			'login_or_not' => $login_or_not,
			'really_customer_id' => $really_customer_id,
        ]);
		
		return $this->fetch('module:blockwishlist4/views/templates/hook/product/add-button-2.tpl');
	}
	

	
	
	

	


	
	
	
	
	
	
	
	
	
	
	
	
}
