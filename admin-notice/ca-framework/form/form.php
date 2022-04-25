<?php 
namespace CA_Framework\Form;

class Form
{
    public $fields;

    public function __construct( $args = array() )
    {
        $this->$args = $args;
    }
}