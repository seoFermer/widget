<?php

namespace Controllers;

class Cart
{
    public array $product = [];
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
        $this->items[$this->product[$code]]['count'] = empty($this->items[$this->product[$code]]) ? 1 : $this->items[$this->product[$code]]['count'] + 1;
    }

    public function costOfProduct()
    {
//        foreach ($this->items as $item) {
//           var_dump($item);
//        }
    }

  /*  public function getTotalCost()
    {


        $discount = $this->discount->buyOneRedWidget($this->items);
        $this->totalCost = $this->totalCost - $discount;
        $deliveryCosts = $this->delivery->getDeliveryCosts($this->totalCost);
        $this->totalCost = $this->totalCost + $deliveryCosts;

        return round($this->totalCost, 2);


    }*/

}