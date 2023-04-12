<?php

class Person {
  private $name;
  private $age;
  private $address;
  
  public function __construct($name, $age, $address) {
    $this->name = $name;
    $this->age = $age;
    $this->address = $address;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getAge() {
    return $this->age;
  }
  
  public function getAddress() {
    return $this->address;
  }
}

class Company {
  private $name;
  private $employees = array();
  
  public function __construct($name) {
    $this->name = $name;
  }
  
  public function hire(Person $person) {
    $this->employees[] = $person;
  }
  
  public function getEmployees() {
    return $this->employees;
  }
}

$person1 = new Person("John Doe", 25, "123 Main St");
$person2 = new Person("Jane Smith", 30, "456 Oak Ave");

$company = new Company("Acme Inc");
$company->hire($person1);
$company->hire($person2);

$employees = $company->getEmployees();
foreach ($employees as $employee) {
  echo $employee->getName() . " - " . $employee->getAge() . " - " . $employee->getAddress() . "\n";
}

/*
A agregação de objetos e a associação de objetos são formas de representar relacionamentos entre objetos na programação orientada a objetos. No entanto, existem algumas diferenças importantes entre eles.

A agregação de objetos é uma forma de composição de objetos na qual um objeto contém outro objeto como parte de seu estado. Isso significa que o objeto agregado é criado e controlado pelo objeto que o contém e seu tempo de vida está vinculado ao do objeto que o contém. Por exemplo, um carro contém um motor, mas o motor pode existir independentemente do carro. No código, o objeto carro criaria e controlaria o objeto motor.

A associação de objetos, por outro lado, é uma forma mais flexível de relacionamento entre objetos em que um objeto tem uma referência a outro objeto, mas não controla sua criação ou tempo de vida. Por exemplo, uma pessoa pode ter uma associação com uma empresa para a qual trabalha, mas a pessoa e a empresa podem existir independentemente uma da outra. No código, o objeto pessoa pode conter uma referência ao objeto empresa, mas o objeto empresa seria criado e controlado independentemente.

Em resumo, a principal diferença entre agregação de objeto e associação de objeto é que a agregação implica propriedade e controle, enquanto a associação implica uma relação mais flexível na qual os objetos são independentes e podem existir uns sem os outros.
*/