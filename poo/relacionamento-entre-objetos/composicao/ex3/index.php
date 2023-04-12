<?php 

class Supplier {
	private $name;
	private $products = array();

	public function __construct($name) {
		$this->name = $name;
	}

	public function addProduct($product) {
		$this->products[] = $product;
	}

	public function getName() {
		return $this->name;
	}

	public function getProducts() {
		return $this->products;
	}
}

class Product {
	private $name;
	private $price;

	public function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}

	public function getName() {
		return $this->name;
	}

	public function getPrice() {
		return $this->price;
	}
}

// Create a few products
$apple = new Product("Apple", 0.50);
$banana = new Product("Banana", 0.25);

// Create a few suppliers
$supplier1 = new Supplier("Supplier 1");
$supplier2 = new Supplier("Supplier 2");

// Add products to the suppliers
$supplier1->addProduct($apple);
$supplier2->addProduct($banana);

// Get the name and products for each supplier
echo $supplier1->getName() . " supplies:\n";
foreach ($supplier1->getProducts() as $product) {
	echo "- " . $product->getName() . " for $" . $product->getPrice() . "\n";
}

echo "\n";

echo $supplier2->getName() . " supplies:\n";
foreach ($supplier2->getProducts() as $product) {
	echo "- " . $product->getName() . " for $" . $product->getPrice() . "\n";
}

?>