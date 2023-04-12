<?php

//https://www.youtube.com/watch?v=_yVnSNAD-GI

require_once "product.php";
require_once "cart.php";

echo "POO Agregação Exemplo  01 <br /><br />";

echo "PRODUTO <br />";
$produto1 = new Product("Smartphone Xiaomi", "200,00");
echo $produto1->getName() . " - ";
echo $produto1->getPrice() . "<br />";

$produto2 = new Product("Tablet Lenovo", "1800,00");
echo $produto2->getName() . " - ";
echo $produto2->getPrice() . "<br />";




echo "<br /><br />";

echo "CARRINHO <br />";
$carrinho = new Cart();
$carrinho->addProduct($produto1);
$carrinho->addProduct($produto2);
echo "<pre>"; print_r($carrinho->getCart()); echo "</pre><br />";



?>