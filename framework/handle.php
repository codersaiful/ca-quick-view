<?php 
namespace CA_Framework;

use CA_Framework\App\Notice as Notice;
use CA_Framework\App\Require_Control as Require_Control;

include_once __DIR__ . '/ca-framework/framework.php';

$r_slug = 'woo-product-table/woo-product-table.php';
$t_slug = 'ca-quick-view/init.php';
$req = new Require_Control($r_slug,$t_slug);
$req->set_args(['Name'=>'Product Table Plugin for WooCommerce'])
->set_message("this sis is  sdisd sdodso")
->set_required()
->run();

$not = new Notice('skdlld');
$not->date_diff = 2;
$not->set_message("skjdfklsjklf ")
->set_title("Hello World")
->add_button([
    'type' => 'warning',
    'text' => 'Purchase Now',
    'link' => '#'
])
->add_button([
    'type' => 'error',
    'text' => 'Doc',
    'link' => '#'
])
// ->set_start_date('4/27/2022 17:1:24')
->show();