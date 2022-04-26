<?php 
include_once __DIR__ . '/ca-framework/framework.php';

use CA_Framework\Form\Form;

class CA_Test_From
{
    public function __construct()
    {
        add_action("admin_menu", [$this, "menu_page"] );
        
    }
    public function menu_page()
    {
        add_menu_page('CA Fram', 'CA Frame', 'manage_options', 'ca-test-form',[$this, 'my_form'], 'dashicons-admin-settings', 10);
    }
    public function my_form()
    {
        ?>
        <h1>Form Testing</h1>
        <form>
            <?php
            
            
            Form::createField([
                'id' => 'test-forms',
                'type'  => 'select',
                'label' => 'Test Form',
                'desc'  => 'This is a test description',
                'value' => '222',
                'options' => [
                    '111' => 'Number One',
                    '222' => 'Number Two',
                    '333' => 'Number Onssse',
                    '444' => 'Number Four',
                ],
                // 'multiple' => true,
            ]);
            Form::createField([
                'id' => 'test-form',
                'label' => 'Test Form',
                'desc'  => 'This is a test description',
                'value' => '22222',
                'data_type' => 'number',
                'range' => [
                    'min'=>'50',
                    'step'=> '100',
                    'max'=> '600'
                ]
                
            ]);
            Form::createField([
                'id' => 'test-formsd',
                'type'=> 'select',
                'label' => 'Test Form',
                'desc'  => 'This is a test description',
                'value' => 2,
                'options' => ['ddd','ffkfl','dddd']
            ]);
            Form::createField([
                'id' => 'test-form',
                'label' => 'Test Form',
                'desc'  => 'This is a test description',
                'value' => 'Hello World Test Value'
            ]);

            var_dump(Form::$fields);
            ?>


        </form>
        
        <?php 

        

        
    }
}

new CA_Test_From();