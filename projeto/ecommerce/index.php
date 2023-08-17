<?php 

session_start();

require_once("vendor/autoload.php");

use \Ecommerce\Model\Category;

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
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
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
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template->setTemplate("users-create.html", $template_data);

});

$app->get('/admin/users', function() {

	\Ecommerce\Model\User::verifyLogin();

	$users = \Ecommerce\Model\User::listAll();

	$template_data = array(
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"],
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
		'NAME_USER' => $_SESSION["User"]["desperson"],
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

	$user = \Ecommerce\Model\User::validForgotDecrypt($_GET['code']);

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	
	$template_data = array(
		'CODE' => $_GET['code']
	);

	$template->setTemplate("recover-password.html", $template_data);

});

$app->post('/admin/forgot/reset', function() {

	$forgot = \Ecommerce\Model\User::validForgotDecrypt($_POST['code']);

	$password = \Ecommerce\Model\User::validPassword(
		$_POST['password1'],
		$_POST['password2']
	);

	\Ecommerce\Model\User::setForgotUsed($forgot['idrecovery']);

	$user = new \Ecommerce\Model\User;

	$user->get((int)$forgot['iduser']);

	$password = password_hash($password, PASSWORD_DEFAULT, ['coast' => 12]);

	$user->setPassword($password, $forgot['iduser']);

	\Ecommerce\Model\User::login($forgot['deslogin'], $_POST['password1']);
	header("Location: ../../admin");
	exit;
	
});

$app->get('/admin/categories', function() {

	$categories = Category::listAll();

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template_data = array(
		'CATEGORIES' => $categories,
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template->setTemplate("categories.html", $template_data);

});

$app->get('/admin/categories/create', function() {


	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);
	$template_data = array(
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"]
	);

	$template->setTemplate("categories-create.html", $template_data);

});

$app->post('/admin/categories/create', function() {

	\Ecommerce\Model\User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header('Location: ../../admin/categories');
	exit;

});

$app->get('/admin/categories/:idcategory/delete', function($idcategory) {

	\Ecommerce\Model\User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: ../../../admin/categories");
	exit;

});

$app->get('/admin/categories/:idcategory', function($idcategory) {

	\Ecommerce\Model\User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$template = new \Ecommerce\Controller\TemplatePage("view/admin", false, true);

	$template_data = array(
		'WWWROOT' => \Ecommerce\Config::getWwwroot(),
		'NAME_USER' => $_SESSION["User"]["desperson"],
		'CATEGORY' => $category->getValues()
	);

	$template->setTemplate("categories-update.html", $template_data);

});

$app->post('/admin/categories/:idcategory', function($idcategory) {

	\Ecommerce\Model\User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header("Location: ../../admin/categories");
	exit;

});

$app->run();

?>