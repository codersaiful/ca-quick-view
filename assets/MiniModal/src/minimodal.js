(function( $ ) {
    // alert(34343);
    $.fn.MiniModal = function( options ) {
 
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
            color: "#556b2f",
            backgroundColor: "transparent"
            // backgroundColor: "white"
        }, options );
 
        // Initialize modal state
        var isOpen = false;
        var footerOverlay = false;

        if(!footerOverlay){
            $(document.body).append( '<div class="minimodal-overlay"></div>' );
            footerOverlay = true;
        }
        console.log(this);
        var WRAPPER_MODAL = $(this);
        // Add open method
        this.open = function() {
            if (!isOpen) {
                isOpen = true;
                WRAPPER_MODAL.show();
                $('.minimodal-overlay').show();
                $('.minimodal-overlay').addClass('minimodal-opened');
                WRAPPER_MODAL.addClass('minimodal-opened');
            }
        };

        // Add close method
        this.close = function() {
            if (isOpen) {
                isOpen = false;
                WRAPPER_MODAL.hide();
                $('.minimodal-overlay').hide();
                $('.minimodal-overlay').removeClass('minimodal-opened');
                WRAPPER_MODAL.removeClass('minimodal-opened');
            }
        };

        //Add set height method
        this.setHeight = function( heightInt ){
            console.log('lllllllll');
            WRAPPER_MODAL.css('height', heightInt + 'px');
        }

        // this.on('click',function(e){
        //     console.log(e);
        //     if (isOpen) {
        //         isOpen = false;
        //         $(this).hide();
        //         $('.minimodal-overlay').hide();
        //         $(this).removeClass('minimodal-opened');
        //     }
            
        // });

        


        return this.each(function(){
            var wrapper = $(this);
            wrapper.css({
                backgroundColor: settings.backgroundColor
            })
            $(this).addClass('minimodal-wrapper');
        });

    };
 
}( jQuery ));


(function( $ ) {

    $(document).ready(function() {

        // alert(34343);
    });

}( jQuery ));