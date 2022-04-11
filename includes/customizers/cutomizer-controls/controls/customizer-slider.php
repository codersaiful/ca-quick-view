<?php
//************** Nav Next-Prev **************
	$wp_customize->add_setting('nav_separator_setting', array(
		'sanitize_callback' => 'sep_sanitize_html'
	));

	/** 
		Nav Icon Color 
	**/
	$wp_customize->add_setting(
      'cawqv_nav_color', //give it an ID
      array(
		'transport' => 'postMessage',
        'default' => '#333333', // Give it a default
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option'
      )
	);
	$wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         'cawqv_nav_color', //give it an ID
         array(
             'label'      => __( 'Nav Color', 'cawqv' ), 
             'section'    => 'cawqv_slider_section',  
             'settings'   => 'cawqv_nav_color',
			 'priority'    => 4,
         )
    )
  );
  
  $wp_customize->add_setting(
      'cawqv_nav_hover_color', //give it an ID
      array(
		'transport' => 'postMessage',
        'default' => '#2271b1', // Give it a default
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option'
      )
	);
	$wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         'cawqv_nav_hover_color', //give it an ID
         array(
             'label'      => __( 'Nav Hover Color', 'cawqv' ), 
             'section'    => 'cawqv_slider_section',  
             'settings'   => 'cawqv_nav_hover_color',
			 'priority'    => 5,
         )
    )
  );
 
	
 ?>