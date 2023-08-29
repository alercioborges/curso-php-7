<?php

use Ecommerce\Model\Category;
use Ecommerce\Model\User;
use Ecommerce\Controller\TemplatePage;
use Ecommerce\Config;


$app->get('/admin/categories', function() {

	User::verifyLogin();

	$categories = Category::listAll();

	$template = new TemplatePage("view/admin", false, true);
	$template_data = array(
		'CATEGORIES' => $categories,
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template->setTemplate("categories.html", $template_data);

});

$app->get('/admin/categories/create', function() {

	User::verifyLogin();

	$template = new TemplatePage("view/admin", false, true);
	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template->setTemplate("categories-create.html", $template_data);

});

$app->post('/admin/categories/create', function() {

	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header('Location: ../../admin/categories');
	exit;

});

$app->get('/admin/categories/:idcategory/delete', function($idcategory) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: ../../../admin/categories");
	exit;

});

$app->get('/admin/categories/:idcategory', function($idcategory) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$template = new TemplatePage("view/admin", false, true);

	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"],
		'CATEGORY' => $category->getValues()
	);

	$template->setTemplate("categories-update.html", $template_data);

});

$app->post('/admin/categories/:idcategory', function($idcategory) {

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->update();

	header("Location: ../../admin/categories");
	exit;

});

?>