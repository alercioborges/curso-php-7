<?php

include_once 'class_veiculo.php';

class Carro extends Veiculo{

  private $modelo;
  private $ano;
  
  public function __construct($modelo, $ano, $tipo, $itemDeIdentificacao) {
    parent::__construct($tipo, $itemDeIdentificacao);    
    $this->modelo = $modelo;
    $this->ano = $ano;    
  }  
  
  public function getModelo() {
    $novoModelo = $this->modelo . ' ' .'Semi-novo';
    return $novoModelo;
  }
  
  public function getAno() {
    $novoAno = $this->ano . '/' . $this->ano + 1;
    return $novoAno;
  }

  

}

?>