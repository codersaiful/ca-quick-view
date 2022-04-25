<?php 
namespace CA_Framework\Form;

use CA_Framework\Form\Inc;
use CA_Framework\Form\Inc\Form_Base;

class Form extends Form_Base
{
    public $fields;

    public function __construct( $args = array() )
    {
        $this->$args = $args;
    }
}