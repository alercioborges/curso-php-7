<?php

use Ecommerce\Controller\TemplatePage;
use Ecommerce\Modal\Category;
use Ecommerce\Modal\Product;
use Ecommerce\Config;

$app->get('/', function() {

	$template = new TemplatePage("view/site", false, true);
	$template_data = array('WWWROOT' => Config::getWwwroot());
	$template->setTemplate("index.html", $template_data);

});

$app->get('/categories/:idcategory', function($idcategory) {

	$category = new Category();

	$category->get((int)$idcategory);

	$template = new TemplatePage("view/site", false, true);
	$template_data = array(
		'CATEGORY' => $category->getValues(),
		'PRODUCTS' => []
	);
	$template->setTemplate("category.html", $template_data);

});

?>