<?php

class Address {

	private $city;
	private $state;

	public function __construct($cityAddress, $stateAddress){
		$this->city = $cityAddress;
		$this->state = $stateAddress;
	}


	//set end get for city
	public function setCity($cityAddress) {
		return $this->city = $cityAddress;
	}

	public function getCity() {
		return $this->city;
	}

	//set end get for state
	public function setState($stateAddress) {
		return $this->state = $stateAddress;
	}

	public function getState() {
		return $this->state;
	}



}

?>