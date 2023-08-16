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

		$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
			":idcategory"=>$this->getidcategory(),
			":descategory"=>$this->getdescategory()
		));

		$this->setData($results[0]);
		
	}

}

?>