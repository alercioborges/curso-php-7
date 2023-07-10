<?php

namespace Ecommerce;

class Config{

	private $configValues = [
		'wwwroot' => 'http://localhost/curso-php-7/projeto/ecommerce/'
	];

	public function wwwroot(){
		return $this->configValues["wwwroot"];
	}

}

?>