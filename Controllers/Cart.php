<?php

namespace Controllers;

class Cart
{
    public float $totalCost = 0;
    public array $items = [];

    public function __construct($product, $discount, $delivery)
    {
        $this->product = $product;
        $this->discount = $discount;
        $this->delivery = $delivery;
    }

    public function add($code)
    {
        if(empty($this->items[$code])){
            $this->items[$code] = $this->product[$code];
            $this->items[$code]['count'] = 1;
        } else {
            $this->items[$code]['count']++;
        }
    }

    public function costOfProduct()
    {
        $cost = 0;
        foreach ($this->items as $item) {
          $cost += $item['count'] * $item['price'];
        }

        return $cost;
    }

    public function getTotalCost()
    {
        $this->totalCost = $this->costOfProduct();
        $this->totalCost -= $this->discount->buyOneRedWidget($this->items);
        $this->totalCost += $this->delivery->discountFromCost($this->totalCost);

        return round($this->totalCost, 2);
    }

}