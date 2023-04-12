<?php

class Engine {
    private $fuelType;
    
    public function __construct($fuelType) {
        $this->fuelType = $fuelType;
    }
    
    public function start() {
        echo "Starting the {$this->fuelType} engine...\n";
    }
}

class Car {
    private $engine;
    
    public function __construct($fuelType) {
        $this->engine = new Engine($fuelType);
    }
    
    public function start() {
        $this->engine->start();
        echo "Driving the car...\n";
    }
}

// Create a car with a petrol engine
$car = new Car('petrol');

// Start the car
$car->start();

?>