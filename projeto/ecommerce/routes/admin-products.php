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
		'PRODUCTS' => $products,
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

$app->post('/admin/products/create', function() {

	User::verifyLogin();

	$product = new Product();

	$product->setData($_POST);

	$product->save();

	header("Location: ../../admin/products");
	exit;

});

$app->get('/admin/products/:idproduct/delete', function($idproduct) {

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$product->delete();

	header("Location: ../../../admin/products");
	exit;

});


$app->get('/admin/products/:idproduct', function($idproduct) {

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$template = new TemplatePage("view/admin", false, true);

	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"],
		'PRODUCTS' => $product->getValues()
	);

	$template->setTemplate("products-update.html", $template_data);

});

$app->post('/admin/products/:idproduct', function($idproduct) {

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$product->setData($_POST);

	$product->update();

	header("Location: ../../admin/products");
	exit;

});



?>