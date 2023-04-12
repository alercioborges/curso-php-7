<?php

class Client {

	private $name;
	private $email;
	private $addresses = [];

	//set end get for name 
	public function setName($nameClient) {
		return $this->name = $nameClient;
	}

	public function getName() {
		return $this->name;
	}

	//set end get for email 
	public function setEmail($emailClient) {
		return $this->email = $emailClient;
	}

	public function getEmail() {
		return $this->email;
	}

	//set end get for addresses
	public function setAddresses($cityAddresses, $stateAddresses) {
		return $this->addresses[] = new Address($cityAddresses, $stateAddresses);
	}

	public function getAddresses() {
		foreach ($this->addresses as $key => $value) {
			echo "Endereço {$key}: {$value->getCity()}/{$value->getState()}<br>";
		} 
	}

}

?>