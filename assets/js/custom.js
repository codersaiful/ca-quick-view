(function($) {
    'use strict';

    // Make the code work after page load.
    $(document).ready(function () {
        // alert(878787);
        // QuantityChange();
        $(document.body).on('click','input.wqpmb_input_text.input-text.qty.text',function(){
            alert(2323232323);
        });

        
        $(document.body).on('click','.caqv-open-modal',function(){

            var $id =  $(this).data('id');
            // $("#cawqv-modal").show();
            $("body").addClass('cawqv-open');

            $(this).append('<div class="loader-wrap"><div id="loader"></div></div>');
            
            $.ajax({
                type: 'POST',
                url: 'https://wpp.local/wp-admin/admin-ajax.php',
                data: {
                    'id': $id,
                    'action': 'get_product' //this is the name of the AJAX method called in WordPress
                },
                success: function (result) {
                $('#modal_container').html(result); 
                $('div#cawqv-modal').show();



                var modal = $(".cawqv-modal").wgModal({
                    responsive:{
                        0: {
                            innerScroll: true,
                            onBeforeOpen    : function(e) {
                                $('.qv-inner').removeClass('ps--active-y');
                            },
                        },
                    },
                    onBeforeOpen    : function(e) {
                        $('body').css('overflow','hidden');
                    },
                    onAfterClose: function (e) {
                        $('body').css('overflow','auto');
                        $("#cawqv-modal").hide();
                        $("body").removeClass('cawqv-open');
                    },
                });
                modal.openModal();


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
                $.getScript('https://wpp.local/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min.js');
                $.getScript('https://wpp.local/wp-content/plugins/ca-quick-view//assets/js/woo-ajax-add-to-cart.js');
            }



        });

    
    });



})(jQuery);