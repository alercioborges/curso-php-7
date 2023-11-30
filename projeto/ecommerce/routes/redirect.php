<?php

use Ecommerce\Config;

$route[] = [
	'/admin',
	'/admin/login',
	
];

foreach ($route as $key => $value) {
	$app->get($value . "/", function () use ($app) {
		$app->redirect(Config::getWwwroot() . $value);
	});
}

?>