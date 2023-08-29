<?php

use Ecommerce\Model\Product;
use Ecommerce\Model\User;
use Ecommerce\Controller\TemplatePage;
use Ecommerce\Config;


$app->get('/admin/products', function() {

	User::verifyLogin();

	$products = Product::listAll();

	$template = new TemplatePage("view/admin", false, true);
	$template_data = array(
		'PRODUCTS' => $products,
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template->setTemplate("products.html", $template_data);

});

$app->get('/admin/products/create', function() {

	User::verifyLogin();

	$products = Product::listAll();

	$template = new TemplatePage("view/admin", false, true);
	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template->setTemplate("products-create.html", $template_data);

});



?>