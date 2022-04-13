<?php
function cawqv_customize_register( $wp_customize ) {
	require_once ( CAWQV_PLUGIN_LITE::cawqv_dir(). '/toggle-control/class-customizer-toggle-control.php' );
	require_once ( CAWQV_PLUGIN_LITE::cawqv_dir(). '/separator-control/class-separator-control.php' );
	require_once ( CAWQV_PLUGIN_LITE::cawqv_dir(). '/slider-range-control/class-slider-range-control.php' );
	require_once ( CAWQV_PLUGIN_LITE::cawqv_dir() . '/icon-picker/icon-picker-control.php');
	
	/**
	 * ************** Add panel **************
	 */
	   $panel = 'cawqv_customizer_panel';
		$wp_customize->add_panel(  $panel, 
			array(
				'priority'       => 22,
				'title'            => __( 'Quick View by Code Astrology Settings', 'cawqv' ),
				'description'      => __( 'You can best appearence if you open the Quick view before customize.', 'cawqv' ),
			) 
		);
	

	/**
	 * ************** Add General sections **************
	 */ 
     $wp_customize->add_section( 'cawqv_general_section', array(
 		'title'       => __( 'General Settings', 'cawqv' ),
 		'priority'    => 10,
 		'panel'       =>  $panel,
 	) );
	/**
	 * ************** Add Animation sections **************
	 */
     $wp_customize->add_section( 'cawqv_animation_section', array(
 		'title'       => __( 'Animation Settings', 'cawqv' ),
 		'priority'    => 10,
 		'panel'       => $panel,
 	) );
	
	/**
	 * ************** Add Icon sections **************
	 */
     $wp_customize->add_section( 'cawqv_icon_section', array(
 		'title'       => __( 'Close Icon Settings', 'cawqv' ),
 		'priority'    => 10,
 		'panel'       => $panel,
 	) );
	/**
		*************** Add Slider sections **************
	 */
     $wp_customize->add_section( 'cawqv_slider_section', array(
 		'title'       => __( 'Slider Settings', 'cawqv' ),
 		'priority'    => 10,
 		'panel'       => $panel,
 	) );
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
	  /** 
	   ************** Quick View Button Label  **************
	  **/
	$wp_customize->add_setting( 'qv_button_label', array(
		  'transport' => 'postMessage',
		  'type' => 'option',
		  'default' => 'Quick View',
		  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'qv_button_label', array(
		  'type' => 'text',
		  'section' => 'cawqv_general_section', // Add a default or your own section
		  'label' => __( 'Quick View Button Label','cawqv' ),
		  'priority' => 1,
	) );
	$wp_customize->add_setting( 'cawqv_general_section', array(
    'default' => 'cawqv-icon-cancel-3',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'transport'  => 'postMessage',
	));

	$wp_customize->add_control(new cawqv_Customizer_Icon_Picker_Control($wp_customize, 'cawqv_general_section', array(
		'label' => __('Quick View Button Icon', 'cawqv'),
		'description' => __('Choose an icon', 'cawqv'),
		'iconset' => 'cawqv-icon',
		'section' => 'cawqv_general_section',
		'priority' => 2,
		'settings' => 'cawqv_general_section',
		'choices' => array(
			'default' 				=> __('Default', 'cawqv'),
			'cawqv-icon-eye'			=> __('cawqv-icon-eye','cawqv'),
			'cawqv-icon-viewer'		=> __('cawqv-icon-viewer','cawqv'),
			'cawqv-icon-file'		=> __('cawqv-icon-file','cawqv'),
			'cawqv-icon-search'		=> __('cawqv-icon-search','cawqv'),
			'cawqv-icon-eye-outline'	=> __('cawqv-icon-eye-outline','cawqv'),
		)
	)));
	
	$wp_customize->add_setting(
      'cawqv_action_button_bg', //give it an ID
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
         'cawqv_action_button_bg', //give it an ID
         array(
             'label'      => __( 'Button Background', 'cawqv' ), 
             'section'    => 'cawqv_general_section',  
             'settings'   => 'cawqv_action_button_bg'
         )
    )
  );

  $wp_customize->add_setting( 'modal_radius',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => '',
			'type' => 'option'
		)
	);
  $wp_customize->add_control( new cawqv_Slider_Custom_Control( $wp_customize, 'modal_radius',
  array(
	  'label' => esc_html__( 'Modal Radius (px)' ),
	  'type' => 'slider_control',
	  'section' => 'cawqv_general_section',
	  'settings' => 'modal_radius',
	  'input_attrs' => array(
		  'min'    => 5,
		  'max'    => 100,
		  'step'   => 1,
		  'suffix' => 'px', //optional suffix
	  ),
  )
) );

$wp_customize->add_setting( 'modal_width',
array(
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => '',
	'type' => 'option'
)
);
$wp_customize->add_control( new cawqv_Slider_Custom_Control( $wp_customize, 'modal_width',
	array(
		'label' => esc_html__( 'Modal Width (%)' ),
		'type' => 'slider_control',
		'section' => 'cawqv_general_section',
		'settings' => 'modal_width',
		'input_attrs' => array(
		'min'    => 5,
		'max'    => 100,
		'step'   => 1,
		'suffix' => '%', //optional suffix
		),
	)
) );
	
  /** 
	************** Close Icon Color ************** 
  **/
	
	$wp_customize->add_setting(
      'cawqv_icon_color', //give it an ID
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
         'cawqv_icon_color', //give it an ID
         array(
             'label'      => __( 'Close Icon Color', 'cawqv' ), 
             'section'    => 'cawqv_icon_section',  
             'settings'   => 'cawqv_icon_color'
         )
    )
  );
  	$wp_customize->add_setting( 'cawqv_icon_picker', array(
    'default' => 'cawqv-icon-cancel-3',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'transport'  => 'postMessage',
	));

	$wp_customize->add_control(new cawqv_Customizer_Icon_Picker_Control($wp_customize, 'cawqv_icon_picker', array(
		'label' => __('Close Icons', 'cawqv'),
		'description' => __('Choose an icon', 'cawqv'),
		'iconset' => 'cawqv-icon',
		'section' => 'cawqv_icon_section',
		'priority' => 5,
		'settings' => 'cawqv_icon_picker',
		'choices' => array(
			'default' => 'Default',
			'cawqv-icon-cancel-circled-outline' => __('Close-1','cawqv'),
			'cawqv-icon-cancel-outline' => __('Close-2','cawqv'),
			'cawqv-icon-cancel' => __('Close-3','cawqv'),
			'cawqv-icon-cancel-circled-1' => __('Close-4','cawqv'),
			'cawqv-icon-window-close' => __('Close-5','cawqv'),
			'cawqv-icon-close' => __('Close-6','cawqv')
		)
	)));
	
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

}
add_action( 'customize_register', 'cawqv_customize_register' );