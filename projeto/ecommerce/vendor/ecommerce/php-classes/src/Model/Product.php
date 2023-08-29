<?php

namespace Ecommerce\Model;

use \Ecommerce\Model;
use \Ecommerce\DB\Sql;

class Product extends Model
{

	public static function listAll()
	{

		$sql = new SQL();

		return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");

	}



	public function save()
	{		

		$sql = new Sql();

		$checkNameExists = Product::checkNameExist($this->getdesproduct());

		if ($checkNameExists['status'] == false) {
			throw new \Exception($checkNameExists['message']);

		} else {

			$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl)", array(
				":idproduct"=>$this->getidproduct(),
				":desproduct"=>$this->getdesproduct(),
				":vlprice"=>$this->getvlprice(),
				":vlwidth"=>$this->getvlwidth(),
				":vlheight"=>$this->getvlheight(),
				":vllength"=>$this->getvllength(),
				":vlweight"=>$this->getvlweight(),
				":desurl"=>$this->getdesurl()
			));

			$this->setData($results[0]);
		}

	}




	public function update()
	{		

		$sql = new Sql();

		$checkUpdateNameExists = Product::checkUpdateNameExists($this->getdesproduct(), $this->getidproduct());

		if ($checkUpdateNameExists['status'] == false) {
			throw new \Exception($checkUpdateNameExists['message']);

		} else {

			$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl)", array(
				":idproduct"=>$this->getidproduct(),
				":desproduct"=>$this->getdesproduct(),
				":vlprice"=>$this->getvlprice(),
				":vlwidth"=>$this->getvlwidth(),
				":vlheight"=>$this->getvlheight(),
				":vllength"=>$this->getvllength(),
				":vlweight"=>$this->getvlweight(),
				":desurl"=>$this->getdesurl()
			));

			$this->setData($results[0]);

		}

	}



	public function get($idproduct)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", array(
			':idproduct' => $idproduct
		));

		$this->setData($results[0]);

	}




	public function delete()
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", array(
			':idproduct' => $this->getidproduct()
		));

	}




	public static function checkNameExist($name_product)
	{
		$sql = new Sql();

		$checkName = $sql->select("SELECT COUNT(*) AS 'CHECKNAME' FROM tb_products WHERE desproduct = '{$name_product}'");

		if ($checkName[0]['CHECKNAME'] > 0) {
			$array_check_name = array(
				'message' => "Nome de produto já existente",
				'status' => false
			);

			return $array_check_name;

		} else {
			$array_check_confirm = array(
				'message' => "Produto criada com sucesso!",
				'status' => true
			);

			return $array_check_confirm;
		}

	}




	public static function checkUpdateNameExists($name_product, $idproduct)
	{

		$sql = new Sql();

		$check_name = $sql->select("SELECT COUNT(*) AS 'CHECKNAME' FROM tb_products WHERE desproduct = '{$name_product}' AND idproduct != {$idproduct}");

		if ($check_name[0]['CHECKNAME'] > 0) {
			$array_check_name = array(
				'message' => "Nome de produto já existente",
				'status' => false
			);

			return $array_check_name;

		} else {
			$array_check_confirm = array(
				'message' => "Produto alterado com sucesso!",
				'status' => true
			);

			return $array_check_confirm;

		}	

	}
}

?>