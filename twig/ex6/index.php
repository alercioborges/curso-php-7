<?php

require_once 'controller/Template.php';

$template = new Template("view", "view/cache", false, true);

$template->setTemplate("template.html");


?>