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
            <input type="text" placeholder="Form Field" name="input-test" value="hello bangladesh">
        </form>
        
        <?php 

        Form::createField('my_option', [
            'id' => 'test-forms',
            'label' => 'Test Form',
            'desc'  => 'This is a test description',
            'value' => 'Hello World Test Value'
        ]);
        Form::createField('my_option', [
            'id' => 'test-form',
            'label' => 'Test Form',
            'desc'  => 'This is a test description',
            'value' => 'Hello World Test Value'
        ]);
        Form::createField('my_option', [
            'id' => 'test-formsd',
            'label' => 'Test Form',
            'desc'  => 'This is a test description',
            'value' => 'Hello World Test Value'
        ]);
        Form::createField('my_option', [
            'id' => 'test-form',
            'label' => 'Test Form',
            'desc'  => 'This is a test description',
            'value' => 'Hello World Test Value'
        ]);

        
    }
}

new CA_Test_From();