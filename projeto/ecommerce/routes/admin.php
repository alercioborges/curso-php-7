<?php

use Ecommerce\Model\User;
use Ecommerce\Controller\TemplatePage;
use Ecommerce\Config;

$app->get('/admin', function() {

	User::verifyLogin();

	$template = new TemplatePage("view/admin", false, true);

	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);
	
	$template->setTemplate("index.html", $template_data);

});

$app->get('/admin/login', function() {

	User::checkErrorLogin();
	
	$template = new TemplatePage("view/admin", false, true);
	$template_data = array('MSG_ERROR' => $_SESSION['msg_error'] ?? NULL);
	$template->setTemplate("login.html", $template_data);

});

$app->post('/admin/login', function() {

	try {
		User::login($_POST['login'], $_POST['password']);
		header("Location: ../admin");
		exit;	
	} catch (Exception $e) {
		$_SESSION['msg_error'] = array(
			'message' => $e->getMessage(),
			'count' => 0
		);
		header("Location: ../admin/login");
		exit;
	}

});

$app->get('/admin/logout', function() {

	User::logout();
	header("Location: ../admin/login");
	exit;

});


$app->get('/admin/forgot', function() {

	$template = new TemplatePage("view/admin", false, true);
	$template->setTemplate("forgot-password.html");

});

$app->post('/admin/forgot', function() {

	$template = new TemplatePage("view/admin", false, true);
	$template->setTemplate("forgot-password-mesage.html");

	$user = User::getForgot($_POST['email']);	

});

$app->get('/admin/forgot/reset', function() {

	$user = User::validForgotDecrypt($_GET['code']);

	$template = new TemplatePage("view/admin", false, true);
	
	$template_data = array(
		'CODE' => $_GET['code']
	);

	$template->setTemplate("recover-password.html", $template_data);

});

$app->post('/admin/forgot/reset', function() {

	$forgot = User::validForgotDecrypt($_POST['code']);

	$password = User::validPassword(
		$_POST['password1'],
		$_POST['password2']
	);

	User::setForgotUsed($forgot['idrecovery']);

	$user = new User();

	$user->get((int)$forgot['iduser']);

	$password = password_hash($password, PASSWORD_DEFAULT, ['coast' => 12]);

	$user->setPassword($password, $forgot['iduser']);

	User::login($forgot['deslogin'], $_POST['password1']);
	header("Location: ../../admin");
	exit;
	
});

$app->get('/admin/login/', function () use ($app) {
    $app->redirect(Config::getWwwroot() . '/admin/login');
});

$app->get('/admin/', function () use ($app) {
    $app->redirect(Config::getWwwroot() . '/admin');
});

?>