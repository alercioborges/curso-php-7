<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {

	$sql = new Ecommerce\DB\Sql();

	$result = $sql->select("SELECT * FROM tb_users");

	echo json_encode($result);

	$results;

});

$app->get('/admin', function() {

	$template = new Ecommerce\Controller\Template("vendor/ecommerce/php-classes/src/View", "vendor/ecommerce/php-classes/src/View/cache", false, true);

	$template->setTemplate("template.html");

	
});

$app->run();

?>