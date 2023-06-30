<?php

namespace Ecommerce\Controller;

class TemplatePage extends Template{

	public function __construct(String $viewFolder, bool $activeCache, bool $activeDebug){

		parent::__construct($viewFolder, "view/cache", $activeCache, $activeDebug);

	}

}

?>

	