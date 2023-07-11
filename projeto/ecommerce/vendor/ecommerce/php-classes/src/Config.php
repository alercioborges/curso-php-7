<?php

namespace Ecommerce;

class Config{

	private $configValues = array(
		'wwwroot' => 'http://localhost/curso-php-7/projeto/ecommerce'
	);

	public function getWwwroot(){
		return $this->configValues['wwwroot'];
	}


}

?>