<?php

namespace Ecommerce\Model;

use \Ecommerce\Model;
use \Ecommerce\DB\Sql;

class Category extends Model{

	public static function listAll(){

		$sql = new SQL();

		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

	}
}

?>