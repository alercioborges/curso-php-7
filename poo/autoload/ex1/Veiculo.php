<?php

class Veiculo {

	private $tipo;
	private $tipoDeIdentificacao;

	public function setTipo($tipoVeiculo){
		$this->tipo = $tipoVeiculo;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipoDeIdentificacao($tipoDeIdentificacaoVeiculo){
		$this->tipoDeIdentificacao = $tipoDeIdentificacaoVeiculo;
	}

	public function getTipoDeIdentificacaoVeiculo(){
		return $this->tipoDeIdentificacaoVeiculo;
	}

}

?>