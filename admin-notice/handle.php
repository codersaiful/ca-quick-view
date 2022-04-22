<?php 
include __DIR__ . '/ca-framework/loader.php';

//RequireControl Part Start Here
// $req = new CA_Framework\Require_Control( 'woo-product-table/woo-product-table.php' );
$req = new CA_Framework\Require_Control( 'woo-product-table/woo-product-table.php', 'ca-quick-view/init.php' );
$args = array(
    'Name' => 'Product Table Plugin for WooCommerce',
    'PluginURI' => 'https://profiles.wordpress.org/codersaiful/#content-plugins',
);
$req->set_args($args)

->run();


//Notice Control
$my_notice = new CA_Framework\Notice('aassa');
// $my_notice->start_date = '4/21/2022 18:48:24';
$my_notice->notice_type = 'warning';
$my_notice->set_message("Most Welcome. Thank you for using Quick View To get more amazing features and the outstanding pro ready-made layouts, please get the")
->set_start_date('4/21/2022 11:05:00')
->set_title( 'Big Offer: UPTO 70% discount!' )
->add_button(array(
    'type' => 'primary',
    'text' => 'Go and Click',
    'target'=> '_blank',
    'link' => 'https://google.com'
))
// ->add_button(array('text'=>"Hello"))
// ->add_button(array('text'=>"It's call",'type'=>'warning'))
->add_button(array('text'=>"Error",'type'=>'error'))
// ->add_button(array('text'=>"Nothing To Show",'link'=>'https://gogle.com'))

->set_img('http://wpp.cm/wp-content/plugins/ca-quick-view/includes/admin//img/notice-img.jpg')
->show();
$another_notice = new CA_Framework\Notice('dssd');
$another_notice->set_message("Nothing to do for it.<a href='#'>Go Premium</a>")
// ->set_img('https://img.freepik.com/free-vector/black-banner-with-yellow-geometric-shapes_1017-32327.jpg')
->show();


