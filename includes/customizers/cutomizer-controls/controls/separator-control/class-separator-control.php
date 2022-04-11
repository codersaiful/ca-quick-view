<?php 
/* Custom Separator */
if (class_exists('WP_Customize_Control')) {
	class cawqv_Separator_Custom_Control extends WP_Customize_Control{
	   public $type = 'separator';
	   public function enqueue(){
		   $assets_path = CAWQV_PATH . '/includes/customizers/cutomizer-controls/controls/separator-control';
		   wp_enqueue_style( 'cawqv-separator', $assets_path . '/css/separator.css' );
		}
	   // Render the control's content.
	   public function render_content(){?>
		<h3 class="separator-info"><?php echo esc_html( $this->label ); ?></h3>
		<small><?php echo wp_kses_post($this->description); ?></small>
	 <?php  } 
	}
 }
 ?>