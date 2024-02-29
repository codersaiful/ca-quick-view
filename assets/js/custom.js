(function($) {
    'use strict';

    // Make the code work after page load.
    $(document).ready(function () {

        var load_head = 0;
        var ajax_url = CAWQV_DATA.ajax_url;
        var ajaxurl = CAWQV_DATA.ajax_url;
        var plugin_url = CAWQV_DATA.plugin_url;
        console.log(plugin_url);

        var inst = $('#cawqv-modal').MiniModal({
            backgroundColor:'transparent'
        });
        $(document.body).on('click','.minimodal-modal-close',function(){
            inst.close();
        });
        $(document.body).on('click','.caqv-open-modal',function(){

            var $id =  $(this).data('id');//301;
            // $("#cawqv-modal").show();
            $("body").addClass('cawqv-open');

            $(this).append('<div class="loader-wrap"><div id="loader"></div></div>');
            
            $.ajax({
                type: 'POST',
                url: ajax_url,
                data: {
                    id: $id,
                    action: 'get_product', //this is the name of the AJAX method called in WordPress
                    load_head: load_head,
                },
                success: function (result) {
                    load_head++;
                $('#cawqv-modal-container').html(result); 
                // $('div#cawqv-modal').show();


                
                // var modal = $(".cawqv-modal").wgModal({
                //     responsive:{
                //         0: {
                //             innerScroll: true,
                //             onBeforeOpen    : function(e) {
                //                 $('.qv-inner').removeClass('ps--active-y');
                //             },
                //         },
                //     },
                //     onBeforeOpen    : function(e) {
                //         $('body').css('overflow','hidden');
                //     },
                //     onAfterClose: function (e) {
                //         $('body').css('overflow','auto');
                //         $("#cawqv-modal").hide();
                //         $("body").removeClass('cawqv-open');
                //     },
                // });
                // modal.openModal();


                $('.loader-wrap').remove();

                // //Slider Init
                var galleryTop = new Swiper(".galleryTop", {
                    grabCursor: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev"
                    },
                    loop: true,
                    loopedSlides: 4,
                    keyboard: {
                        enabled: true,
                        onlyInViewport: false
                    }
                    });
                    /* thumbs */
                    var galleryThumbs = new Swiper(".gallery-thumbs", {
                    spaceBetween: 5,
                    centeredSlides: true,
                    slidesPerView: "auto",
                    touchRatio: 0.4,
                    slideToClickedSlide: true,
                    loop: false,
                    loopedSlides: 4,
                    keyboard: {
                        enabled: true,
                        onlyInViewport: false
                    }
                    });

                    /* set conteoller  */
                    galleryTop.controller.control = galleryThumbs;
                    galleryThumbs.controller.control = galleryTop;
            
                // //const ps = new PerfectScrollbar('.qv-inner', {});
                },
                complete: function(){

                    
                    inst.open();
                    var height = $('#cawqv-modal-container .cawqv-image-area .woocommerce-product-gallery.woocommerce-product-gallery--with-images').height();
                    inst.setHeight(height);
                    cawqvLoadVariationScript();
                },
                error: function() {
                    console.log("error");
                }
                
            });

            /**
             * Load variation Scripts
             *
             * @since      1.0.0
             */
            function cawqvLoadVariationScript() {
                // $.getScript( plugin_url + 'woocommerce/assets/js/frontend/single-product.min.js');
                $.getScript( plugin_url + 'woocommerce/assets/js/frontend/add-to-cart-variation.min.js');
                $.getScript(plugin_url + 'ca-quick-view//assets/js/woo-ajax-add-to-cart.js');
            }



        });

    
    });



})(jQuery);