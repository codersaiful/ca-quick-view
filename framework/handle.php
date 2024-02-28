<?php 
namespace CA_Framework;

use CA_Framework\App\Notice as Notice;
use CA_Framework\App\Require_Control as Require_Control;

include_once __DIR__ . '/ca-framework/framework.php';

$r_slug = 'woo-product-table/woo-product-table.php';
$t_slug = 'ca-quick-view/init.php';
$req = new Require_Control($r_slug,$t_slug);
$req->set_args(['Name'=>'Product Table Plugin for WooCommerce'])
->set_message("Product Table Plugin is a famous plugin for displaying product in Table View.")
// ->set_required()
->run();

