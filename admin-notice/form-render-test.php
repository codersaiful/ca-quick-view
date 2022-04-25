<?php 


class CA_Test_From
{
    public function __construct()
    {
        add_menu_page('CA Fram', 'CA Frame', 'manage_option', 'ca-test-form',[$this, 'my_form']);
    }
    public function my_form()
    {
        ?>
        <h1>Form Testing</h1>
        <form>
            
        </form>
        
        <?php 
    }
}

new CA_Test_From();