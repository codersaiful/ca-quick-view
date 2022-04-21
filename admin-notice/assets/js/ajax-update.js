jQuery( document ).ready( function() {
	jQuery( document ).on( 'click', '.ca-notice-dismiss', function(event) {
       
            var data = {
                action: 'update_notice_status',
            };
        
		jQuery.post( ajaxobj.ajaxurl, data, function() {
            if(data){
                console.log(data);
            }
		});
    });
});

