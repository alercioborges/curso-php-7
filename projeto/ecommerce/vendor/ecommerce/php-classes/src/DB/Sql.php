<?php 

namespace Ecommerce\DB;

class Sql {

	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "admin";
	const DBNAME = "db_ecommerce";

	private $conn;

	public function __construct()
	{

		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	public function exeProc($callProc, $params = array())
	{
		$stmt = $this->conn->prepare($callProc);

		$this->setParams($stmt, $params);

		$stmt->execute();
		
		/*
		$stmt->bindParam(":deslogin", $deslogin);
		$stmt->bindParam(":desemail", $desemail);
		$stmt->bindParam(":desperson", $desperson);
		$stmt->bindParam(":despassword", $despassword);
		$stmt->bindParam(":nrphone", $$nrphone );
		$stmt->bindParam(":inadmin", $inadmin);
		
		$stmt->execute();

		return $stmt;

		return $stmt;
		*/

	}

}

?>