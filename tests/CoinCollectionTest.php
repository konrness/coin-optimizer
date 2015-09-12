<?php

namespace CoinOptimizerTests;

use CoinOptimizer\Coin;
use CoinOptimizer\CoinCollection;

class CoinCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $quarter = new Coin('quarter', 0.25, 5.670,  1.75);
        $dime    = new Coin('dime',    0.10, 2.268,  1.35);
        $nickel  = new Coin('nickel',  0.05, 5.000,  1.95);
        $penny   = new Coin('penny',   0.01, 2.500,  1.52);

        $coinCollection = new CoinCollection([
            $penny,
            $dime,
            $quarter,
            $nickel,
        ]);

        $expectedSort = [
            $quarter,
            $dime,
            $nickel,
            $penny,
        ];

        $this->assertEquals($expectedSort, $coinCollection->getSortedCoins());

    }

    public function testSetCoins()
    {
        $quarter = new Coin('quarter', 0.25, 5.670,  1.75);
        $dime    = new Coin('dime',    0.10, 2.268,  1.35);
        $nickel  = new Coin('nickel',  0.05, 5.000,  1.95);
        $penny   = new Coin('penny',   0.01, 2.500,  1.52);

        $coinCollection = new CoinCollection();

        $coinCollection->setCoins([
            $penny,
            $dime,
            $quarter,
            $nickel,
        ]);

        $expectedSort = [
            $quarter,
            $dime,
            $nickel,
            $penny,
        ];

        $this->assertEquals($expectedSort, $coinCollection->getSortedCoins());
    }

    public function testAddCoins()
    {
        $quarter = new Coin('quarter', 0.25, 5.670,  1.75);
        $dime    = new Coin('dime',    0.10, 2.268,  1.35);
        $nickel  = new Coin('nickel',  0.05, 5.000,  1.95);
        $penny   = new Coin('penny',   0.01, 2.500,  1.52);
        $halfDollar = new Coin('half-dollar',   0.50, 11.340, 2.15);


        $coinCollection = new CoinCollection();

        $coinCollection->setCoins([
            $penny,
            $dime,
            $quarter,
            $nickel,
        ]);

        $coinCollection->addCoin($halfDollar);

        $expectedSort = [
            $halfDollar,
            $quarter,
            $dime,
            $nickel,
            $penny,
        ];

        $this->assertEquals($expectedSort, $coinCollection->getSortedCoins());
    }

    public function testDuplicateCoinValues()
    {
        $quarter = new Coin('quarter', 0.25, 5.670,  1.75);
        $dime    = new Coin('dime',    0.10, 2.268,  1.35);
        $nickel  = new Coin('nickel',  0.05, 5.000,  1.95);
        $penny   = new Coin('penny',   0.01, 2.500,  1.52);
        $halfDollar = new Coin('half-dollar',   0.50, 11.340, 2.15);
        $susanBAnthonyQuarter = new Coin('susan-b-anthony-quarter', 0.25, 5.670,  1.75);


        $coinCollection = new CoinCollection();

        $coinCollection->setCoins([
            $penny,
            $dime,
            $quarter,
            $nickel,
            $susanBAnthonyQuarter,
        ]);

        $coinCollection->addCoin($halfDollar);

        $expectedSort = [
            $halfDollar,
            $quarter,
            $susanBAnthonyQuarter,
            $dime,
            $nickel,
            $penny,
        ];

        $this->assertEquals($expectedSort, $coinCollection->getSortedCoins());
    }

}
 