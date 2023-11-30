<?php

use Ecommerce\Model\User;
use Ecommerce\Config;
use Ecommerce\Controller\TemplatePage;

$app->post('/admin/users/create', function() {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	try{
		$user->createUser();
<<<<<<< HEAD
		echo "<pre>"; var_dump($_POST); echo "</pre>";
		//header("Location: ../../admin/users");
		//exit;
=======
		header("Location: ../../admin/users");
		exit;
>>>>>>> 226fb2f249410ec95871ce215a000c0f357e7f21
	} catch (Exception $e) {
		$_SESSION['msg_error_create'] = array(
			'message' => $e->getMessage(),
			'code_error' => $e->getCode(),
			'count' => 0
		);
<<<<<<< HEAD

		$data_form[] = $_POST;
		
		foreach ($data_form[0] as $key => $value) {
			setcookie($key, $value);
		}

=======
		$user::setCacheData($_POST);
>>>>>>> 226fb2f249410ec95871ce215a000c0f357e7f21
		header("Location: ../../admin/users/create");
		exit;
	}

});

$app->get('/admin/users/create', function() {

	User::verifyLogin();

	User::checkErrorSave();

	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'MSG_ERROR_CREATE' => $_SESSION['msg_error_create'] ?? NULL,
		'COOKIE_DATA' => $_COOKIE,
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template = new TemplatePage("view/admin", false, true);
	$template->setTemplate("users-create.html", $template_data);

});

$app->get('/admin/users', function() {

	User::verifyLogin();

	$users = User::listAll();

	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"],
		'USERS' => $users
	);

	$template = new TemplatePage("view/admin", false, true);
	$template->setTemplate("users.html", $template_data);

});

$app->get('/admin/users/:iduser/delete', function($iduser) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete($iduser);

	header("Location: ../../../admin/users");
	exit;

});

$app->get('/admin/users/:iduser', function($iduser) {

	User::verifyLogin();

	User::checkErrorSave();

	$user = User::getUserById($iduser);

	$template_data = array(
		'WWWROOT' => Config::getWwwroot(),
		'IDUSER' => $iduser,
		'MSG_ERROR_CREATE' => $_SESSION['msg_error_create'] ?? NULL,
		'COOKIE_DATA' => $_COOKIE,
		'NAME_USER' => $_SESSION["User"]["desperson"],
		'USER' => $user
	);

	$template = new TemplatePage("view/admin", false, true);
	$template->setTemplate("users-update.html", $template_data);

});

$app->post('/admin/users/:iduser', function($iduser) {

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);

	try{
		$user->update($iduser);
		header("Location: ../../admin/users");
		exit;
	} catch (Exception $e) {
		$_SESSION['msg_error_create'] = array(
			'message' => $e->getMessage(),
			'code_error' => $e->getCode(),
			'count' => 0
		);
		$user::setCacheData($_POST);
		header("Location: ../../admin/users/{$iduser}");
		exit;
	}

});

?>