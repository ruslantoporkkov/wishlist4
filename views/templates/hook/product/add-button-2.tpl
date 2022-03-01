
{if $login_or_not eq '1'}
	<button type="button" id="" class="btn_signin_2 wishlist-button-add wishlist-button-product" data-idprodcurr="" data-reallycustomerid="{$really_customer_id}" style="margin-left: 5px;">
		<i class="material-icons">favorite_border</i>
	</button>
{/if}

<script>
window.onload = function(){
	$('.thumbnail-container').each(function(index, value){
	var search_a = value.innerHTML.match(/data-id="..?"/im);
	console.log(search_a[0].split('"')[1]);
	var wishlist_elem = search_a[0].split('"')[1];
	$(".product .product-miniature[data-id-product='"+wishlist_elem+"'] .wishlist-button-add").attr('data-idprodcurr', wishlist_elem);
	$(".product .product-miniature[data-id-product='"+wishlist_elem+"'] .wishlist-button-add").attr('id', 'id_prod_num-'+wishlist_elem);
	});
	
	$( ".wishlist-button-add" ).click(function() {
		//alert(this.id);
		var customer_id_front = $('#'+this.id).attr('data-reallycustomerid');
		var product_id_front = $('#'+this.id).attr('data-idprodcurr');
		//console.log(customer_id_front, product_id_front);
		var url = 'https://{$host_url_for_template}/modules/blockwishlist4/ajax2.php';
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


