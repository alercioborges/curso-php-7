<?php

require_once("config.php");


class Sql extends Connection {

    //Quando instancias a clasee Sql, ira criar uma conexao c/ o BD automaticamente
    public function __construct() {
        parent::__construct(); //Método construtor da clase 'Connection' 

    }

    private function setParams($statment, $parameters = array()) {
        //Adiciona no método "setParam" (abaixo) os valores e--
        //--indices do array recebidas pelo parametro
        foreach ($parameters as $key => $value) {

            $this->setParam($key, $value);

        }

    }

    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);

    }

    //Método para receber as queries em SQL (prepare    )
    public function setQuery($rawQuery, $params = []) {

    //atributo protected 'conn' da classe Connection
        $stmt = $this->conn->prepare($rawQuery); 

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    public function select($rawQuery, $params = []):array {

        $stmt = $this->setQuery($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

     public function insert($rawQuery, $params = []):array {

        $stmt = $this->setQuery($rawQuery, $params);
        $msg = "<br><br>Usuário cadastrado com sucesso! <br><br>";
        return $msg;

    }

}

?>