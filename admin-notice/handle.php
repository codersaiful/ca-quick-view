<?php 

include __DIR__ . '/notice-framework/notice.php';

$my_notice = new CA_Admin_Notice('sddvpl-');
// $my_notice->start_date = '4/21/2022 18:48:24';
$my_notice->notice_type = 'warning';
$my_notice->set_message("Most Welcome. Thank you for using Quick View To get more amazing features and the outstanding pro ready-made layouts, please get the")
->set_start_date('4/21/2022 11:05:00')
->show();
$my_notice = new CA_Admin_Notice('dsfvfpld-d');
$my_notice->set_message("Nothing to do for it.");
$my_notice->set_img('');
// ->show();
