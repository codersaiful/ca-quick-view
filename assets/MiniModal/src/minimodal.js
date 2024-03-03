(function( $ ) {
    let MINIMODAL_INST;
    $.fn.MiniModal = function( options ) {
 
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
            color: "#556b2f",
            backgroundColor: "transparent"
        }, options );
 
        // Initialize modal state
        var isOpen = false;
        var footerOverlay = false;

        if(! footerOverlay ){
            $(document.body).append( '<div class="minimodal-overlay"></div>' );
            footerOverlay = true;
        }
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

        


        MINIMODAL_INST = this.each(function(){
            var wrapper = $(this);
            wrapper.css({
                backgroundColor: settings.backgroundColor
            })
            $(this).addClass('minimodal-wrapper');
        });
        return MINIMODAL_INST;
    };
 

    $(document).ready(function() {
        $(document.body).on('click','.minimodal-overlay',function(){
            // $(this).removeClass('minimodal-opened');
            MINIMODAL_INST.close();
        });
    });

}( jQuery ));