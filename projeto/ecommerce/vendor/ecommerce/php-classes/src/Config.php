<?php

namespace Ecommerce;

class Config{

	private static $configValues = array(
		'wwwroot' => 'http://localhost/curso-php-7/projeto/ecommerce'
	);

	public static function getWwwroot()
	{

		return self:: $configValues['wwwroot'];
	}



	public static function getDirectory()
	{

		$protocol = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
		$domain = str_replace($protocol, '', self:: $configValues['wwwroot']);
		$domain = substr($domain, 1);
		$subdomain = DIRECTORY_SEPARATOR . $domain . DIRECTORY_SEPARATOR;
		
		return $subdomain;

	}

}

?>