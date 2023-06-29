<?php

namespace Ecommerce\Controller;

class TemplateIndex extends Template{

	public function __construct(bool $activeCache, bool $activeDebug){

		parent::__construct("view", "view/cache", $activeCache, $activeDebug);

	}

}

?>

	