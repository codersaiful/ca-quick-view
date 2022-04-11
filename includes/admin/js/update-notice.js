jQuery( document ).ready( function() {
	jQuery( document ).on( 'click', '.aep-notice a', function(event) {
        if( jQuery(event.target).hasClass('never-show')) {
            var data = {
                action: 'never_show',
            };
        }
		jQuery.post( ajaxobj.ajaxurl, data, function() {
            if(data){
                jQuery('.aep-notice').fadeOut();
            }
		});
    });
});

