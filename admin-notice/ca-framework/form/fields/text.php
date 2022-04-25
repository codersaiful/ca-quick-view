<?php 
namespace CA_Framework\Form\Fields;

use CA_Framework\Form\Inc\Field_Base;

class Text extends Field_Base
{
    public function __construct( $args )
    {
        parent::__construct( $args );
    }
    public function render()
    {

        ?>
        <input 
        type="<?php echo esc_attr( $this->type ); ?>"
        value="<?php echo esc_attr( $this->value ); ?>"
        class="ca-field-single <?php echo esc_attr( $this->class_name ); ?>"
        name="<?php echo esc_attr( $this->name ); ?>"
        >
        <?php 
    }

}