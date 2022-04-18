<?php
	/** 
		************** window Bg **************
	**/
	$wp_customize->add_setting(
      'cawqv_window_bg', //give it an ID
      array(
		'transport' => 'postMessage',
        'default' => '#fff', // Give it a default
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option'
      )
	);
	$wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         'cawqv_window_bg', //give it an ID
         array(
             'label'      => __( 'Popup Background', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_window_bg'
         )
    )
  );
	
   /** 
   ************** Sale Flash **************
  **/
	$wp_customize->add_setting(
      'cawqv_sale_flash_bg', //give it an ID
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
         'cawqv_sale_flash_bg', //give it an ID
         array(
             'label'      => __( 'Sale flash Background', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_sale_flash_bg'
         )
    )
  );
  
/** 
   ************** Title Color **************
  **/
	$wp_customize->add_setting(
      'cawqv_title_color', //give it an ID
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
         'cawqv_title_color', //give it an ID
         array(
             'label'      => __( 'Title Color', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_title_color'
         )
    )
  );
  
  /** 
   ************** Description Color **************
  **/
	$wp_customize->add_setting(
      'cawqv_desc_color', //give it an ID
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
         'cawqv_desc_color', //give it an ID
         array(
             'label'      => __( 'Description Color', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_desc_color'
         )
    )
  ); 
  /** 
   ************** Meta Pruduct Color **************
  **/
	$wp_customize->add_setting(
      'cawqv_product_meta_color', //give it an ID
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
         'cawqv_product_meta_color', //give it an ID
         array(
             'label'      => __( 'Pruduct Meta Color', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_product_meta_color'
         )
    )
  );
  /** 
   ************** Meta Pruduct Link Color **************
  **/
	$wp_customize->add_setting(
      'cawqv_product_meta_link_color', //give it an ID
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
         'cawqv_product_meta_link_color', //give it an ID
         array(
             'label'      => __( 'Pruduct Meta Link Color', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_product_meta_link_color'
         )
    )
  );
   /** 
   ************** Price Color **************
  **/
	$wp_customize->add_setting(
      'cawqv_product_price_color', //give it an ID
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
         'cawqv_product_price_color', //give it an ID
         array(
             'label'      => __( 'Pruduct Price Color', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_product_price_color'
         )
    )
  );
  /** 
   ************** Review Color **************
  **/
	$wp_customize->add_setting(
      'cawqv_product_review_color', //give it an ID
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
         'cawqv_product_review_color', //give it an ID
         array(
             'label'      => __( 'Pruduct Review Color', 'cawqv' ), 
             'section'    => 'cawqv_customizer_section',  
             'settings'   => 'cawqv_product_review_color'
         )
    )
  );