<?php
class cawqv_Customizer_Range_Value_Control extends \WP_Customize_Control {
	public $type = 'range-value';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 3.4.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-range-control-js', $this->cawqv_controller_path() . '/range-control/js/customizer-range-value-control.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'customizer-range-control-css', $this->cawqv_controller_path() . '/range-control/css/customizer-range-value-control.css' , array(), rand() );
	}

	/**
	 * Render the control's content.
	 *
	 * @author soderlind
	 * @version 1.2.0
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span  style="width:100%; flex: 1 0 0; vertical-align: middle;">
				<input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>"
				  <?php
					$this->input_attrs();
					$this->link();
					?>
				>
				<span class="range-slider__value">0</span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo wp_kses_post($this->description); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
	public function cawqv_controller_path(){
		$controller_path = cawqv_PATH . '/includes/customizers/cutomizer-controls/controls';
		return $controller_path;
	}

}