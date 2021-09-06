<?php

namespace Controllers;

class Cart
{
    public Delivery $delivery;
    public Discount $discount;
    public Products $product;

    public float $productCost = 0;
    public array $items = [];

    public function __construct()
    {
        $this->delivery = new Delivery();
        $this->discount = new Discount;
        $this->product = new Products();
    }

    public function add($code)
    {
        $this->items[$code] = empty($this->items[$code]) ? 1 : $this->items[$code] + 1;
    }

    public function getTotalCost()
    {
        foreach ($this->items as $code => $count) {
            $product = $this->product->getProduct($code);
            $this->productCost += $product['price'] * $count;
        }

        $discount = $this->discount->getDiscountByProduct($this->items);
        $totalCost = $this->productCost - $discount;
        $deliveryCosts = $this->delivery->getDeliveryCosts($totalCost);
        $totalCost = $totalCost + $deliveryCosts;

        $totalCost = round($totalCost, 2);

        return $totalCost;
    }

}