<?php

namespace CoinOptimizer;

class USCoinCollectionFactory
{
    public static function create()
    {
        return new CoinCollection([
            new Coin('silver-dollar', 1.00, 8.100,  2.00),
            new Coin('half-dollar',   0.50, 11.340, 2.15),
            new Coin('quarter',       0.25, 5.670,  1.75),
            new Coin('dime',          0.10, 2.268,  1.35),
            new Coin('nickel',        0.05, 5.000,  1.95),
            new Coin('penny',         0.01, 2.500,  1.52),
        ]);
    }
} 