<?php 

include __DIR__ . '/notice-framework/notice.php';

$my_notice = new CA_Admin_Notice('sddvpl-');
$my_notice->notice_type = 'error';
$my_notice->set_message("Most Welcome. Thank you for using Quick View To get more amazing features and the outstanding pro ready-made layouts, please get the")
->show();
$my_notice = new CA_Admin_Notice('saifuld');
$my_notice->set_message("Nothing to do for it.");
$my_notice->set_img('http://wpp.cm/wp-content/plugins/ca-quick-view/admin-notice/notice-framework/assets/img/InPlugin-Notice-1.gif')
->show();
