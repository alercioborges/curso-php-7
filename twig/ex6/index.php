<?php

require_once 'model/Template.php';

$template = new Template("view", "view/cache", false, true);

$template->setTemplate("template.html");


?>