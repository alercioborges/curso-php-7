<?php

class Cart{

	private $product = [];

	public function addProduct(Product $productCart){
		$this->product[] = $productCart;
		//diferente da composição, a agr. ñ-
		//cria/instancia um novo objeto
		//somente agrega ao vetor
		//Não tem dependencia
		//Existe sem a outra parte
	}

	public function showCart(){
		return $this->product;
	}

}

?>