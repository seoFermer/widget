<?php

namespace Controllers;

use Interface\OfferInterface;

class OffersRuleA implements OfferInterface
{
    public function apply($cart)
    {
        $sum = 0;

        foreach ($cart as $product) {
            if ($product['code'] == 'R01') {
                $count = $product['count'] % 2 != 0 ? $product['count'] - 1 : $product['count'];
                $sum = intdiv($count, 2) * $product['price'] * 0.50;
                $sum = round($sum, 2);
            };
        }

        return $sum;
    }
}