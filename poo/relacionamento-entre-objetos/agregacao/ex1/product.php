<?php

class Product{

	private $name;
	private $price;

	function __construct($nameProduct, $priceProduct){
		$this->name = $nameProduct;
		$this->price = $priceProduct;
	}

	public function getName(){
		return $this->name;
	}

	public function getPrice(){
		return $this->price;
	}

}

?>