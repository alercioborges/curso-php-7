<?php


class Person{

	public function __call($methodName, $pamam){

		if ($methodName == 'andar') {
			echo "A pessoa andou <br>";

		} elseif ($methodName == 'setName') {
			$pamam = "Alercio <br>";
			echo $pamam;	

		} elseif ($methodName == 'data') {
			$pamam = array(
				'name' => "Alercio",
				'age' => "34",
				'city' => "São Paulo"
			);

			print_r($pamam);  
		}

	}

}

$pessoa = new Person();

$pessoa->andar();
$pessoa->setName();
$pessoa->data();

?>