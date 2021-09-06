<?php

use Controllers\Products;
use Controllers\Cart;

spl_autoload_register(function ($class) {
    include(__DIR__ . "/" . str_replace('\\', '/', $class . ".php"));
});

// Baskets
$baskets = [
    [ 'B01', 'G01'],
    [ 'R01', 'R01'],
    [ 'R01', 'G01'],
    [ 'B01', 'B01', 'R01', 'R01', 'R01']
];

//Implementation
foreach ($baskets as $basket){
    $cart = new Cart();
    foreach ($basket as $code){
        $cart->add($code);
    }

    echo $cart->getTotalCost() . '<br>';
}


