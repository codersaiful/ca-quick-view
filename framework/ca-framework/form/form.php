<?php 
namespace CA_Framework\Form;

use CA_Framework\Form\Inc;
use CA_Framework\Form\Inc\Field;
use CA_Framework\Form\Inc\Form_Base;

class Form extends Form_Base
{
    public $fields;
    public $options;
    public $menus;

    public $keyword;


    public function __construct( $keyword, $args = array() )
    {
        if( ! is_string( $keyword ) ) return;
        $this->keyword = ! empty( $keyword ) ? $keyword : 'caf';
        // $this->$args = $args;
    }

    public function createField( $args = array() )
    {   
        $field = $this->setFieldsSingle( $args );
        $field->render();
    }

    public function addField( $args = array() )
    {   
        $this->setFieldsSingle( $args );
        
    }

    private function setFieldsSingle( $args = array() )
    {
        if( ! isset( $args['id'] ) ) return new Field( [] );

        $filed_id = ! empty( $args['id'] ) ? $args['id'] : 'field_id';
        
        $field = new Field( $args );

        $this->fields[$filed_id]=$field->args;
        $this->options[$filed_id]=$field->args['value'] ?? '';
        return $field;

    }
    public function render()
    {

    }
}