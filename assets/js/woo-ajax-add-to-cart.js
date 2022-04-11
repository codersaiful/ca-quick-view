jQuery(document).ready(function() {
	 var add_to_cart_btn = jQuery('.single_add_to_cart_button');
	 add_to_cart_btn.click(function(e) {
		 e.preventDefault();
		var $thisbutton = jQuery(this),
                $form = $thisbutton.closest('form.cart'),
                id = $thisbutton.val(),
                product_qty = $form.find('input[name=quantity]').val() || 1,
                product_id = $form.find('input[name=product_id]').val() || id,
                variation_id = $form.find('input[name=variation_id]').val() || 0;

        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };
	
       jQuery(document.body).trigger('adding_to_cart', [$thisbutton, data]);

        jQuery.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $thisbutton.removeClass('added').addClass('loading');
            },
            complete: function (response) {
                $thisbutton.addClass('added').removeClass('loading');
            },
            success: function (response) {
                jQuery( document.body ).trigger( 'wc_fragment_refresh' );
				jQuery( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );

				// Redirect to cart option
				/* if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
					window.location = wc_add_to_cart_params.cart_url;
					return;
				} */
            },
        });
		
      });
});

