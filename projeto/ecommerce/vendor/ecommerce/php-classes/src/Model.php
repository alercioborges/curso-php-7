<?php

namespace Ecommerce; //namespace principal criado pelo autoload do composer

class Model{

	private $values = [];

	public function __call($nameMethod, $args){

		//Atribui se o metodo é GET ou SET
		$method = substr($nameMethod, 0, 3);

		//Atribui o compo do metodo (getNome = Nome)
		$fieldName = substr($nameMethod, 3, strlen($nameMethod));

		var_dump($method, $fieldName);
		exit;




	}
}

?>