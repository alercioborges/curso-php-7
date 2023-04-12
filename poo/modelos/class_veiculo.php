<?php

class Veiculo{

	public $tipo;
	public $itemDeIdentificacao;

	public function __construct($tipo, $itemDeIdentificacao) {
		$this->tipo = $tipo;
		$this->itemDeIdentificacao = $itemDeIdentificacao;
	}

}

?>