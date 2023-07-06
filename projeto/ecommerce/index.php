<?php 

session_start();

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {

	$template = new Ecommerce\Controller\TemplatePage("view/site", false, true);

	$template->setTemplate("index.html");

});

$app->get('/admin', function() {

	\Ecommerce\Model\User::verifyLogin();

	$template = new \Ecommerce\Controller\TemplatePage("view/admin" ,false, true);
	
	$template->setTemplate("index.html");

});

$app->get('/admin/login', function() {

	$template = new Ecommerce\Controller\TemplatePage("view/admin" ,false, true);

	$template->setTemplate("login.html");

});

$app->post('/admin/login', function() {

	\Ecommerce\Model\User::login($_POST['login'], $_POST['password']);

	header("Location: ../admin");

	exit;

});

$app->get('/admin/logout', function() {

	\Ecommerce\Model\User::logout();

	header("Location: ../admin/login");

	exit;

});

$app->get('/teste', function() {

	$sql = new Ecommerce\DB\Sql();

	$result = $sql->select("SELECT * FROM tb_users");

	echo json_encode($result);

	$results;

});

$app->run();

?>