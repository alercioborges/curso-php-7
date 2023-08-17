<?php

namespace Ecommerce\Model;

use \Ecommerce\Model;
use \Ecommerce\DB\Sql;

class Category extends Model
{

	public static function listAll()
	{

		$sql = new SQL();

		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

	}



	public function save()
	{		

		$sql = new Sql();

		$checkNameExists = Category::checkNmaeExist($this->getdescategory());

		if ($checkNameExists['status'] == false) {
			throw new \Exception($checkNameExists['message']);

		} else {

			$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
				":idcategory"=>$this->getidcategory(),
				":descategory"=>$this->getdescategory()
			));

			$this->setData($results[0]);

		}

	}



	public function get($idCategory)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(
			':idcategory' => $idCategory
		));

		$this->setData($results[0]);

	}




	public function delete()
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", array(
			':idcategory' => $this->getidcategory()
		));

	}




	public static function checkNmaeExist($name_category)
	{
		$sql = new Sql();

		$checkName = $sql->select("SELECT COUNT(*) AS 'CHECKNAME' FROM tb_categories WHERE descategory = '{$name_category}'");

		if ($checkName[0]['CHECKNAME'] > 0) {
			$array_check_name = array(
				'message' => "Nome de categoria já existente",
				'status' => false
			);

			return $array_check_name;

		} else {
			$array_check_confirm = array(
				'message' => "Categoria criada com sucesso!",
				'status' => true
			);

			return $array_check_confirm;
		}

	}

}

?>