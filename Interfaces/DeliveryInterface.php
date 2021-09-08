<?php

namespace Interface;

interface DeliveryInterface
{
    public function apply($cart, $totalAmount);

}