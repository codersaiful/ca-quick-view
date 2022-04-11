<?php
 
if (class_exists('WP_Customize_Control')) {
	class cawqv_Customizer_Icon_Picker_Control extends \WP_Customize_Control {

		public $type = 'cawqv-icon-picker';

		public $iconset = array();

		public function to_json() {
			if ( empty( $this->iconset ) ) {
				$this->iconset = 'cawqv-icon';
			}
			$iconset               = $this->iconset;
			$this->json['iconset'] = $iconset;
			parent::to_json();
		}
		
		public function enqueue() {
			//declare assets path
			$assets_path = CAWQV_PATH . '/includes/customizers/cutomizer-controls/controls/icon-picker/assets';
			wp_enqueue_script( 'cawqv-icon-picker-ddslick-min', CAWQV_PLUGIN_LITE::cawqv_assets_path() . '/icon-picker/assets/js/jquery.ddslick.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'cawqv-icon-picker-control', CAWQV_PLUGIN_LITE::cawqv_assets_path() . '/icon-picker/assets/js/icon-picker-control.js', array( 'jquery', 'cawqv-icon-picker-ddslick-min' ), '', true );
			wp_enqueue_style( 'cawqv-icon', $assets_path . '/css/fontello.css' );
		}

		public function render_content() {
			if ( empty( $this->choices ) ) {
				require_once CAWQV_PLUGIN_LITE::cawqv_dir() . '/icon-picker/inc/cawqv-icons.php';
				$this->choices = cawqv_icon_list();
			}
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<select class="cawqv-icon-picker-icon-control" id="<?php echo esc_attr( $this->id ); ?>">
					<?php foreach ( $this->choices as $value => $label ) : ?>
						<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( $this->value(), $value, false ); ?> data-iconsrc="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		<?php }

	}
}

