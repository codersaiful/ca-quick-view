<?php
	$wp_customize->add_setting('animation_upsell_setting', array(
		'sanitize_callback' => 'sep_sanitize_html'
	));
	$wp_customize->add_control(new Upsell_Inner_Section_Control($wp_customize, 
	   'animation_upsell_setting', array(
	   'settings' => 'animation_upsell_setting',
	   'section' => 'cawqv_animation_section',
	   'label'   => 'Premium Controls',
	   'priority'   => 1,
	   'url' 		=> 'https://codeastrology.com/wp/woocommerce-quick-view/#plugin_price',
	   'background'	=> '#22b147',
	)));
 ?>