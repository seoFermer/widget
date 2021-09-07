<?php

namespace Controllers;

class Discount
{

    public function __construct()
    {

    }

    public function buyOneRedWidget($products)
    {
       /* $discount = 0;

        foreach ($products as $code => $count) {
            if ($code == 'R01') {
                $isQuantityEvent = $count % 2;
                if ($isQuantityEvent != 0) {
                    $count = $count - 1;
                }
                $quantityProductDiscount = intdiv($count, 2);
                $product = $this->product->getProduct($code);
                $discount = $quantityProductDiscount * $product['price'] * 0.50;
            };
        }

        return $discount;*/
    }
}