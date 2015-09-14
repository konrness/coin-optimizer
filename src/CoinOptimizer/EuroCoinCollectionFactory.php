<?php

namespace CoinOptimizer;

class EuroCoinCollectionFactory
{
    public static function create()
    {
        /**
         * @see https://en.wikipedia.org/wiki/Euro_coins
         */
        return new CoinCollection([
            new Coin('one-cent-euro',    0.01, 2.30, 1.67),
            new Coin('two-cent-euro',    0.02, 3.06, 1.67),
            new Coin('five-cent-euro',   0.05, 3.92, 1.67),
            new Coin('ten-cent-euro',    0.10, 4.10, 1.93),
            new Coin('twenty-cent-euro', 0.20, 5.74, 2.14),
            new Coin('fifty-cent-euro',  0.50, 7.80, 2.38),
            new Coin('one-euro',         1.00, 7.50, 2.33),
            new Coin('two-euro',         2.00, 8.50, 2.20),
        ]);
    }
}
