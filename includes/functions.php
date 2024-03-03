<?php
/**
 * Undocumented function
 *
 * @param string $property
 * @param string|null|bool $value
 * @param string $valueUnit
 * @return void
 */
function cawqv_set_css($property, $value, $valueUnit = ''){
	if( empty( $value ) ) return;
	echo esc_attr( $property . ": " . $value . $valueUnit . ';' );
}
function cawqv_set_css_by_option($property, $option_key, $valueUnit = ''){
	$value = get_option( $option_key );
	cawqv_set_css($property, $value, $valueUnit);
}

function cawqv_thumb_image(){
	
}