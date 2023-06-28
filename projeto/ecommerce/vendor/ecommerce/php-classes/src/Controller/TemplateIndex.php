<?php

namespace Ecommerce\Controller;

class TemplateIndex extends Template{

	public function __construct(bool $activeCache, bool $activeDebug){

		parent::__construct("vendor/ecommerce/php-classes/src/View", "vendor/ecommerce/php-classes/src/View/cache", $activeCache, $activeDebug);

	}

}

?>

	