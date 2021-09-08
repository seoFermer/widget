<?php

namespace Controllers;

use Interface\DeliveryInterface;

class DeliveryRuleA implements DeliveryInterface
{
    public function apply($cart, $totalAmount)
    {
        $deliveryAmount = 0;

        if ($totalAmount > 0) {
            $deliveryAmount = 4.95;
            if ($totalAmount > 50) $deliveryAmount = 2.95;
            if ($totalAmount > 90) $deliveryAmount = 0;
        }

        return $deliveryAmount;
    }

}