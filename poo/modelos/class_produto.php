<?php

class Produto{

	private $tipoProduto;
	private $itemDeIdentificacao;

	public function setTipoProduto($tipo){
		return $this->tipoProduto = $tipo;
	}

	public function getTipoProduto(){
		return $this->tipoProduto;
	}

	public function setItemDeIdentificacao($item){
		return $this->itemDeIdentificacao = $item;
	}

	public function getItemDeIdentificacao(){
		return $this->itemDeIdentificacao;
	}


}


?>