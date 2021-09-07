<?php

use Controllers\Cart;
use Controllers\Delivery;
use Controllers\Discount;

spl_autoload_register(function ($class) {
    include(__DIR__ . "/" . str_replace('\\', '/', $class . ".php"));
});

$discount = new Discount();
$delivery = new Delivery();

$product = [
    'R01' => [
        'code' => 'R01',
        'title' => 'Red Widget',
        'price' => 32.95,
    ],
    'G01' => [
        'code' => 'G01',
        'title' => 'Green Widget',
        'price' => 24.95,
    ],
    'B01' => [
        'code' => 'B01',
        'title' => 'Blue Widget',
        'price' => 7.95,
    ]
];

// Baskets
$baskets = [
    [ 'B01', 'G01'],
    [ 'R01', 'R01'],
    [ 'R01', 'G01'],
    [ 'B01', 'B01', 'R01', 'R01', 'R01']
];

//Implementation
foreach ($baskets as $basket){
    $cart = new Cart($product, $discount, $delivery);
    foreach ($basket as $code){
        $cart->add($code);
    }
    echo '<pre>'; print_r($cart->items);
}


