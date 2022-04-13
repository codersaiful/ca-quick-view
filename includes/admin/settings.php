
<div class="ca-wrap">
    <div class="ca-inner">
        <div class="ca-infobox">
            <div class="ca-header">
                 <h1 class="ca-infobox-tilte"><?php echo esc_html( 'CA WOOCOMMERCE QUICK VIEW', 'cawqv' ); ?></h1>
                 <small> <?php echo esc_html( 'A Perfect WooCommerce Quick View Plugin With Perfect Options.', 'cawqv' ); ?></small>
            </div>

            <div class="row">
                <div class="column-2"> 
                <div class="cawqv-logo">
                    <img src="<?php echo plugins_url("/", __FILE__) .
                        "/img/cawqv.jpg"; ?>" >
                </div>
                <?php 
                $message = __( '<strong>Quick View by Code Astrology</strong> (WooCommerce Quick View) allows users to get a quick look at products without opening the product page. Users can navigate the product gallery from one to another using the next and previous slider buttons.
                 <p>Users can live style quick view. Please go to the settings button to live customize.</p> ', 'cawqv' );
 
                printf( '<div class="%1$s"><p>%2$s</p></div>', '', wp_kses_post( $message ) );
                ?>
                
                <a href="<?php echo admin_url( "/customize.php?autofocus[panel]=cawqv_customizer_panel");?>" class="btn ca-btn"> <?php echo __("Go to Settings", "cawqv"); ?></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- .wrap -->