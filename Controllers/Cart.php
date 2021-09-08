<?php

namespace Controllers;

class Cart
{
    public array $products;
    public array $deliveryRules;
    public array $offersRules;

    public array $items = [];

    public float $offersAmount = 0;
    public float $deliveryAmount = 0;
    public float $totalAmount = 0;

    public function __construct($products, $deliveryRules, $offersRules)
    {
        $this->products = $products;
        $this->deliveryRules = $deliveryRules;
        $this->offersRules = $offersRules;
    }

    public function add($code)
    {
        if (isset($this->products[$code])) {
            if (empty($this->items[$code])) {
                $this->items[$code] = $this->products[$code];
                $this->items[$code]['count'] = 1;
            } else {
                $this->items[$code]['count']++;
            }
        }
    }

    public function costOfProducts()
    {
        $cost = 0;
        foreach ($this->items as $item) {
            $cost += $item['count'] * $item['price'];
        }

        return $cost;
    }

    public function getTotalAmount()
    {
        $this->totalAmount = $this->costOfProducts();

        foreach ($this->offersRules  AS $rules)
        {
            $this->offersAmount += $rules->apply($this->items);
        }
        $this->totalAmount -= $this->offersAmount;

        foreach ($this->deliveryRules  AS $rules)
        {
            $this->deliveryAmount += $rules->apply($this->items, $this->totalAmount);
        }

        $this->totalAmount += $this->deliveryAmount;

        return round($this->totalAmount, 2);
    }

}