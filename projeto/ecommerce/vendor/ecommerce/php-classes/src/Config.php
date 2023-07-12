<?php

namespace Ecommerce;

class Config{

	private static $configValues = array(
		'wwwroot' => 'http://localhost/curso-php-7/projeto/ecommerce'
	);

	public static function getWwwroot(){
		return self:: $configValues['wwwroot'];
	}


}

?>