<?php

namespace Controllers;

class Products
{
    public array $product;

    public function __construct()
    {
        //Products
        $this->product = [
          'R01' => [
            'code' => 'R01',
            'title' => 'Red Widget',
            'price' => 32.95,
          ],
            'G01' => [
                'code' => 'G01',
                'title' => 'Green Widget',
                'price' => 24.95,
            ],
            'B01' => [
                'code' => 'B01',
                'title' => 'Blue Widget',
                'price' => 7.95,
            ]
        ];

    }

    public function getProduct($code)
    {
        return $this->product[$code];
    }


}