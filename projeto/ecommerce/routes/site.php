<?php

use Ecommerce\Controller\TemplatePage;
use Ecommerce\Config;

$app->get('/', function() {

	$template = new TemplatePage("view/site", false, true);
	$template_data = array('WWWROOT' => Config::getWwwroot());
	$template->setTemplate("index.html", $template_data);

});




?>