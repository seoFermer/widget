<?php

namespace Controllers;

class Discount
{
    public function buyOneRedWidget($products)
    {
        $discount = 0;

        foreach ($products as $product) {
            if ($product['code'] == 'R01') {
                $count = $product['count'] % 2 != 0 ? $product['count'] - 1 :  $product['count'];
                $discount = intdiv($count, 2) * $product['price'] * 0.50;
                $discount = round($discount, 2);
            };
        }

        return $discount;
    }
}