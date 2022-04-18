<?php
/** 
	************** Add to Cart Button ************** 
  **/
  $wp_customize->add_setting( 'btn_padding_top_bottom',
  array(
	  'default' => '',
	  'transport' => 'postMessage',
	  'sanitize_callback' => '',
	  'type' => 'option'
  )
);
$wp_customize->add_control( new cawqv_Slider_Custom_Control( $wp_customize, 'btn_padding_top_bottom',
  array(
	  'label' => esc_html__( 'Padding Top/Bottom (px)' ),
	  'type' => 'slider_control',
	  'section' => 'cawqv_add_to_cart_section',
	  'settings' => 'btn_padding_top_bottom',
	  'input_attrs' => array(
		  'min'    => 5,
		  'max'    => 100,
		  'step'   => 1,
		  'suffix' => 'px', //optional suffix
	  ),
  )
) );
$wp_customize->add_setting( 'btn_padding_left_right',
  array(
	  'default' => '',
	  'transport' => 'postMessage',
	  'sanitize_callback' => '',
	  'type' => 'option'
  )
);
$wp_customize->add_control( new cawqv_Slider_Custom_Control( $wp_customize, 'btn_padding_left_right',
  array(
	  'label' => esc_html__( 'PADDING LEFT/RIGHT (px)' ),
	  'type' => 'slider_control',
	  'section' => 'cawqv_add_to_cart_section',
	  'settings' => 'btn_padding_left_right',
	  'input_attrs' => array(
		  'min'    => 10,
		  'max'    => 100,
		  'step'   => 1,
		  'suffix' => 'px', //optional suffix
	  ),
  )
) );
$wp_customize->add_setting(
'cawqv_cart_button_bg', //give it an ID
array(
  'transport' => 'postMessage',
  'default' => '#111111', // Give it a default
  'sanitize_callback' => 'sanitize_hex_color',
  'type' => 'option'

)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
   $wp_customize,
   'cawqv_cart_button_bg', //give it an ID
   array(
	   'label'      => __( 'Cart Button Background', 'cawqv' ), 
	   'section'    => 'cawqv_add_to_cart_section',  
	   'settings'   => 'cawqv_cart_button_bg'
   )
)
);
/** 
**************  View Button **************
**/
$wp_customize->add_setting(
'cawqv_view_cart_button_bg', //give it an ID
array(
  'transport' => 'postMessage',
  'default' => '#111111', // Give it a default
  'sanitize_callback' => 'sanitize_hex_color',
  'type' => 'option'

)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
   $wp_customize,
   'cawqv_view_cart_button_bg', //give it an ID
   array(
	   'label'      => __( 'View Cart Button', 'cawqv' ), 
	   'description'=> __('View Cart Background', 'cawqv'),
	   'section'    => 'cawqv_add_to_cart_section',
	   'settings'   => 'cawqv_view_cart_button_bg'
   )
)
);