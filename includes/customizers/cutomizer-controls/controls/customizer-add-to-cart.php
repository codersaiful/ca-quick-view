<?php
	$wp_customize->add_setting('acart_upsell_setting', array(
		'sanitize_callback' => 'sep_sanitize_html'
	));
	$wp_customize->add_control(new Upsell_Inner_Section_Control($wp_customize, 
	   'acart_upsell_setting', array(
	   'settings' => 'acart_upsell_setting',
	   'section' => 'cawqv_add_to_cart_section',
	   'label'   => 'Premium Controls',
	   'priority'   => 1,
	   'url' 		=> 'https://codeastrology.com/checkout?edd_action=add_to_cart&download_id=6553&edd_options%5Bprice_id%5D=1',
	   'background'	=> '#22b147',
	)));
 ?>