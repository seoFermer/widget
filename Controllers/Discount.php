<?php

namespace Controllers;

class Discount
{
    public function buyOneRedWidget($products)
    {
        $discount = 0;

        foreach ($products as $product) {
            if ($product['code'] == 'R01') {
                $isQuantityEvent = $product['count'] % 2;
                $count = $product['count'];
                if ($isQuantityEvent != 0) {
                    $count = $product['count'] - 1;
                }
                $quantityProductDiscount = intdiv($count, 2);

                $discount = $quantityProductDiscount * $product['price'] * 0.50;
                $discount = round($discount, 2);
            };
        }

        return $discount;
    }
}