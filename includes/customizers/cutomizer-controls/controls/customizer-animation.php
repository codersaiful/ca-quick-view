
<?php 
	//************** Animation Dropdown **************
	$wp_customize->add_setting('animation_separator', array(
		'sanitize_callback' => 'sep_sanitize_html'
	));
	$wp_customize->add_control(new cawqv_Separator_Custom_Control($wp_customize, 
	   'animation_separator', array(
	   'settings' 	=> 'animation_separator',
	   'section' 	=> 'cawqv_animation_section',
	   'label'   	=> 'Animation Settings',
	   'priority'   => 1,
	)));
	$wp_customize->add_setting( 'qv_animation', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
	 array(
		'default'    => 'fadeInDown', //Default setting/value to save
		'type'       => 'option',
		'transport'  => 'postMessage',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize,
	 'qv_animation',
	 array(
		'description' => __( 'Using this option you can change the animation entrances type' ),
		'priority'   => 2,
		'section'    => 'cawqv_animation_section',
		'type'    => 'select',
		'choices' => CAWQV_FRONTEND::cawqv_animation(),
	)
	));

?>