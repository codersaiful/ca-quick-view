<?php 
include_once __DIR__ . '/ca-framework/framework.php';

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
    }
}

new CA_Test_From();