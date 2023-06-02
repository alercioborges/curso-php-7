<?php

require_once("vendor/autoload.php");

use \Slim\slim;

$app = new Slim();

$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});

$app->get('/', function () {
    echo "Hello";
});

$app->get('/admin/login/', function () {
    echo "Rota /admin/login/";
});

$app->get('/user/', function () {
    $data = [
        'id' => 12,
        'username' => 'alercio',
        'name' => "Alercio Silva",
        'email' => "alercioborges@gmail.com"
    ];

    $result = json_encode($data);

    echo $result    ;

});

$app->get('/userdate/:id', function ($id) {

    if ($id==1) {
        $data = [
        'id' => 1,
        'username' => 'alercio',
        'name' => "Alercio Silva",
        'email' => "alercioborges@gmail.com"
    ];
        
    } else if ($id==2) {
     $data = [
        'id' => 2,
        'username' => 'borges',
        'name' => "Alercio Borges",
        'email' => "alercio.borges@gmail.com"
    ];
}
 $result = json_encode($data);
    echo $result;
});

$app->run();

?>