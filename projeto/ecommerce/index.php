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

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);

	$template_data = array(
		'NAME' => "Alercio Silva",
		'WWWROOT' => \Ecommerce\Config::getWwwroot()
	);
	
	$template->setTemplate("index.html", $template_data);

});

$app->get('/admin/login', function() {

	$template = new Ecommerce\Controller\TemplatePage("view/admin", false, true);

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

$app->get('/admin/users', function() {

	\Ecommerce\Model\User::verifyLogin();

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);

	$userList = array(
		array('ID'=>1, 'NOME'=>'Alercio Silva', 'EMAIL'=>'alercio@email.com', 'LOGIN'=>'admin', 'ADMIN'=>'SIM'),
		array('ID'=>2, 'NOME'=>'Marina Barbosa', 'EMAIL'=>'marina@email.com', 'LOGIN'=>'marina', 'ADMIN'=>'NÃO')
	);

	$template_data = array(
		'NAME' => "Alercio Silva",
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'USERLIST' => $userList
	);
	
	$template->setTemplate("users.html", $template_data);

});

$app->get('/admin/users/:userid', function($userid) {

	echo "O ID do usuário é: {$userid}";
});

$app->get('/admin/users/:userid/delete', function($userid) {

	echo "O ID do usuário que será deletado é: {$userid}";
});

$app->get('/teste', function() {

	$sql = new Ecommerce\DB\Sql();

	$result = $sql->select("SELECT * FROM tb_users");

	echo json_encode($result);

	$results;

});

$app->run();

?>