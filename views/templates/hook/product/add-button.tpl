{**
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
 *}
{if $login_or_not eq '1'}
	<button type="button" id="btn_signin" class="wishlist-button-add wishlist-button-product" style="margin-left: 5px;"><i class="material-icons">favorite_border</i></button>
{else}
    <button type="button" id="btn_signout" class="btn btn-primary wishlist-button-add wishlist-button-product" data-bs-toggle="modal" style="margin-left: 5px;" data-bs-target="#exampleModal"><i class="material-icons">favorite_border</i></button>
{/if}




<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		You need to be logged in to save products in your wishlist.
		<a href="https://{$host_url_for_template_2}/login" title="Log in to your customer account" rel="nofollow">
		  <i class="material-icons"></i>
		  <span class="hidden-sm-down">Sign in</span>
        </a>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div id="product_id_front" style="display: none;">{$idprodcurr}</div>
<div id="customer_id_front" style="display: none;">{$really_customer_id}</div>
<div id="random_number"></div>

<script>
  window.onload = function(){
  
    $( "#btn_signin" ).click(function() {

		var customer_id_front = $('#customer_id_front').html();
		var product_id_front = $('#product_id_front').html();
		var url = 'https://{$host_url_for_template_2}/modules/blockwishlist4/ajax.php'; 
		$.ajax({
			url : url,
			data: { 
				customer_id_front: customer_id_front,
				product_id_front: product_id_front,
			},
			method: "POST",
			success : function(response){
			  //console.log(response);
			  alert(response);
			  //$('#random_number').html(response);
			} 
		});
	});
  };
</script>




