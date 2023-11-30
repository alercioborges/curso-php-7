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



	public static function setCacheData(array $data_form)
	{	
		$data[] = $data_form;

		foreach ($data[0] as $key => $value) {
			setcookie($key, $value, time()+1);
		}

		return $data;
	}




	public function checkPhoto()
	{
		if (file_exists(
			$_SERVER['DOCUMENT_ROOT']
			. \Ecommerce\Config::getDirectory()
			. "view" . DIRECTORY_SEPARATOR
			. "site". DIRECTORY_SEPARATOR
			. "img" . DIRECTORY_SEPARATOR
			. "products" . DIRECTORY_SEPARATOR
			. $this->getidproduct() . ".jpg" 
		)) {
			$url = "../../view/site/img/products/" . $this->getidproduct() . ".jpg";
		} else{
			$url = "../../view/site/img/products/product.jpg";
		}

		return $this->setdesphoto($url);
	}




	public function getValues()
	{
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}




	public function setPhoto($file)
	{
		if ($file['error'] !== 4) {

			$extension = explode('.', $file['name']);
			$extension = end($extension);

			if (
				$extension !== "jpg"
				&& $extension !== "jpeg"
				&& $extension !== "gif"
				&& $extension !== "png"			
			) {
				throw new \Exception("Extensão de arquivo não suportado", 2);
			}

			switch ($extension) {
				case 'jpg':
				case 'jpeg':
				$image = imagecreatefromjpeg($file["tmp_name"]);
				break;

				case 'gif':
				$image = imagecreatefromgif($file["tmp_name"]);
				break;

				case 'png':
				$image = imagecreatefrompng($file["tmp_name"]);
				break;			
			}

			$dist = $_SERVER['DOCUMENT_ROOT']
			. \Ecommerce\Config::getDirectory()
			. "view" . DIRECTORY_SEPARATOR
			. "site". DIRECTORY_SEPARATOR
			. "img" . DIRECTORY_SEPARATOR
			. "products" . DIRECTORY_SEPARATOR
			. $this->getidproduct() . ".jpg";

			imagejpeg($image, $dist);
			imagedestroy($image);		

			$this->checkPhoto();

		}

	}

}


?>