<?php

namespace Ecommerce; //namespace principal criado pelo autoload do composer

class Model{

	private $values = [];

	public function __call($nameMethod, $args){

		//Atribui se o metodo é GET ou SET
		$method = substr($nameMethod, 0, 3);

		//Atribui o compo do metodo (getNome = Nome)
		$fieldName = substr($nameMethod, 3, strlen($nameMethod));

		switch ($method) {
			case 'get':
			return $this->values[$fieldName];
			break;

			case 'set':
			$this->values[$fieldName] = $args;
			break;
		}

	}

	public function setData(array $data){

		foreach ($data as $key => $value) {
			$this->{"set".$key}($value); //atributo criado dinamicamente (permitido usar 'this' p/ atrib. dinamicos)
		}
	}

	public function getValues(){
			return $this->values;
	}

}

?>