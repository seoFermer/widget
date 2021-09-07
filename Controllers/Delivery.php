<?php

namespace Controllers;

class Delivery
{
    public function discountFromCost($totalCosts)
    {
        $deliveryCosts = 4.95;

        if ($totalCosts > 50) $deliveryCosts = 2.95;
        if ($totalCosts > 90) $deliveryCosts = 0;

        return $deliveryCosts;
    }
}