<?php

//Para as variaveis com os dados de conexão com o BD receberem os valeras das constantes
require_once("config.php");

//Extendendo a classe 'PDO' nativo do PHP
//A classe terá os métodos da classe PDO e + a que será implementadas
class Connection extends PDO {

    protected $conn;

    //Método que será inicializado ao instanciar a classe
    public function __construct() {

        //Passando para as variaveis os valores das constantes--
        //--com os dados de conexão ao BD 
        $dsn = DSN;
        $host = HOST;
        $dbuser = DBUSER;
        $dbpass = DBPASS;
        $dbname = DBNAME;

        //Conexão com o banco de dados via classe PDO
        Try{
            $this->conn = new PDO("{$dsn}:dbname={$dbname};host={$host}", $dbuser, $dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e) {
         echo "Erro de conexão com o banco de dados: ".$e->getMessage();
     }

 }

}

?>