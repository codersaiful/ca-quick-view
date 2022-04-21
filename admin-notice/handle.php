<?php 

include __DIR__ . '/ca-framework/notice.php';
include __DIR__ . '/ca-framework/loader.php';

$my_notice = new CA_Framework\Notice('aaa');
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
$my_notice = new CA_Framework\Notice('dsfvfpld-d');
$my_notice->set_message("Nothing to do for it.");
$my_notice->set_img('');
// ->show();


//RequireControl Part Start Here
$req = new CA_Framework\Require_Control();