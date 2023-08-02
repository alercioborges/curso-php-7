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
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"][0]
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

$app->post('/admin/users/create', function() {

	\Ecommerce\Model\User::verifyLogin();

	$user = new \Ecommerce\Model\User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->createUser();

	header("Location: ../../admin/users");

	exit;

});

$app->get('/admin/users/create', function() {

	\Ecommerce\Model\User::verifyLogin();

	$template_data = array(
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"][0]
	);

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template->setTemplate("users-create.html", $template_data);

});

$app->get('/admin/users', function() {

	\Ecommerce\Model\User::verifyLogin();

	$users = \Ecommerce\Model\User::listAll();

	$template_data = array(
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"][0],
		'USERS' => $users
	);

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template->setTemplate("users.html", $template_data);

});

$app->get('/admin/users/:iduser/delete', function($iduser) {

	\Ecommerce\Model\User::verifyLogin();

	$user = new \Ecommerce\Model\User();

	$user->get((int)$iduser);

	$user->delete($iduser);

	header("Location: ../../../admin/users");
	exit;

});

$app->get('/admin/users/:iduser', function($iduser) {

	\Ecommerce\Model\User::verifyLogin();

	$user = \Ecommerce\Model\User::getUserById($iduser);

	$template_data = array(
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'IDUSER' => $iduser,
		'NAME_USER' => $_SESSION["User"]["desperson"][0],
		'USER' => $user
	);

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template->setTemplate("users-update.html", $template_data);

});

$app->post('/admin/users/:iduser', function($iduser) {

	\Ecommerce\Model\User::verifyLogin();

	$user = new \Ecommerce\Model\User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update($iduser);

	header("Location: ../../admin/users");
	exit;

});

$app->get('/admin/forgot', function() {

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template->setTemplate("forgot-password.html");

});

$app->post('/admin/forgot', function() {

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template->setTemplate("forgot-password-mesage.html");

	$user = \Ecommerce\Model\User::getForgot($_POST['email']);	

});

$app->get('/admin/forgot/reset', function() {

	//$user = new \Ecommerce\Model\User::validForgotDecrypt($_GET['code']);

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template->setTemplate("recover-password.html");

});

$app->post('/admin/forgot/reset', function() {

	$user = new \Ecommerce\Model\User;

	$user->get((int)28);

	if ($_POST['password1'] != $_POST['password2']) {
		throw new \Exception("A senha precisa ser igual nos dois campos");
		
	} else{

		$user->setPassword($_POST['password1']);

	}


});



$app->run();

?>