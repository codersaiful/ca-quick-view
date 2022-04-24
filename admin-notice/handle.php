<?php 
namespace CA_Framework;

include __DIR__ . '/ca-framework/framework.php';


$another_notice = new Notice('yysdsdfsd');
$another_notice->set_message("Nothing to do for it.<a href='#'>Go Premium</a>")
->set_img('https://img.freepik.com/free-vector/black-banner-with-yellow-geometric-shapes_1017-32327.jpg')
->show();

$myReq = new Require_Control('woo-product-table/woo-product-table.php','ca-quick-view/init.php');
$args = array(
    'Name' => 'Product Table Plugin for Woocccc'
);
$myReq->notice_id = '3343ds4';
$myReq->set_args($args)
->set_download_link('https://glglelel.com')
->set_required()
->run();

/**

$myReq = new Require_Control('woo-product-table/woo-product-table.php','ca-quick-view/init.php');
$args = array(
    'Name' => 'Product Table Plugin for Woocccc'
);
$myReq->notice_id = '3343ds4';
$myReq->set_args($args)
->set_download_link('https://glglelel.com')
->set_required()
->run();



//RequireControl Part Start Here
// $req = new Require_Control( 'woo-product-table/woo-product-table.php' );
$req = new Require_Control( 'woo-product-table/woo-product-table.php', 'ca-quick-view/init.php' );
$req->notice_id = '3s4343';
$args = array(
    'Name' => 'Product Table Plugin for WooCommerce',
    'PluginURI' => 'https://profiles.wordpress.org/codersaiful/#content-plugins',
);
$req->set_args($args)
->set_download_link('https://wordpress.org/plugins/woo-product-table/')
->set_this_download_link('https://wordpress.org/plugins/ca-quick-view/');
// ->set_required()
// ->run();
// var_dump($req);


//Notice Control
$my_notice = new Notice('yyysyysa');
// $my_notice->start_date = '4/21/2022 18:48:24';
$my_notice->notice_type = 'warning';
$my_notice->set_message("Most Welcome. Thank you for using Quick View To get more amazing features and the outstanding pro ready-made layouts, please get the")
->set_start_date('4/21/2022 11:05:00')
// ->set_end_date('10/21/2022 11:05:00')
->set_title( 'Product Table for WooCommerce(Plus):<br> UPTO 70% discount!' )
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

->set_img('http://wpp.cm/wp-content/plugins/ca-quick-view/includes/admin//img/notice-img.jpg');
// ->show();
$another_notice = new Notice('yyysydsdfsd');
$another_notice->set_message("Nothing to do for it.<a href='#'>Go Premium</a>")
->set_img('https://img.freepik.com/free-vector/black-banner-with-yellow-geometric-shapes_1017-32327.jpg')
->show();
 */