<?php 

class Product {

    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}


class Cart {
    public $items = [];
    //Somente um atributo de lista
    //que recebe os objetos da outra classe

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotalPrice() {
        $totalPrice = 0;

        foreach ($this->items as $item) {
            $totalPrice += $item->price;
        }

        return $totalPrice;
    }
}

// Create some products and add them to the cart
$product1 = new Product('Product A', 100);
$product2 = new Product('Product B', 150);
$product3 = new Product('Product C', 200);


$cart = new Cart();
$cart->addItem($product1);
$cart->addItem($product2);
$cart->addItem($product3);

// Print out the total price of the cart
echo 'Total price: $' . $cart->getTotalPrice() . "<br /><br />";

echo $product1->name . " - ";
echo $product1->price . "<br />";

echo $product2->name . " - ";
echo $product2->price . "<br />";

echo $product3->name . " - ";
echo $product3->price . "<br /><br />";

//adicionando valores nos atributor usando o __set
$product1->name = "Smartphone XIAOMI POCO X3 PRO";
$product1->price = 2000;

$product2->name = "Tablet Lenovo";
$product2->price = 1800;

$product3->name = "Caixa de som JBL";
$product3->price = 800;

echo "Depois do uso do __set <br />";

echo $product1->name . " - ";
echo $product1->price . "<br />";

echo $product2->name . " - ";
echo $product2->price . "<br />";

echo $product3->name . " - ";
echo $product3->price . "<br />";

?>