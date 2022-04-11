<?php 

 /**
	 * Upsell Inner Section Customizer Controls
	 *
	 * @author B M Rafiul Alam  <https://https://github.com/rafiul>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/
	 */
if (class_exists('WP_Customize_Control')) {
	
	class cawqv_Upsell_Inner_Section_Control extends \WP_Customize_Control{
		   public $type = 'upsell_inner';
		   public $url ='';
		   public $background ='';
		  
		 /**
		 * Enqueue scripts/styles.
		 *
		 * @since 3.4.0
		 */
		   public function enqueue(){
			   wp_enqueue_style( 'info-control-css', $this->assets_path() . 'css/control.css',false,'1.1','all' );
			}
		 /**
		 * Render the control's content.
		 */
		   public function render_content(){?>
			<a href="<?php echo esc_url( $this->url);?>" class="info-link" target="_blank" >
				<h3 class="info-title" style="background:<?php echo esc_attr($this->background);?>">
					<?php echo esc_html( $this->label ); ?>
				</h3>
			</a>
			<small><?php echo wp_kses_post($this->description); ?></small>
		 <?php  }
		 
		 /**
		 * Aseets path.
		 *
		 * @return path
		 */
		 public function assets_path(){
			$assets_path = plugin_dir_url( __FILE__ );
			return $assets_path;
		}
	
	}
}
?>