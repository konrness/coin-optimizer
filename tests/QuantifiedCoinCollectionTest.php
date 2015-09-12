<?php

namespace CoinOptimizerTests;

use CoinOptimizer\Coin;
use CoinOptimizer\CoinCollection;
use CoinOptimizer\QuantifiedCoinCollection;

class QuantifiedCoinCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var QuantifiedCoinCollection
     */
    public $collection;

    public function setup()
    {
        $this->collection = new QuantifiedCoinCollection();
    }


    public function testSetGetQuantity()
    {
        $coin = new Coin('foo', 10.10, 20.20, 30.30);

        $this->collection[$coin] = 5;

        $this->assertEquals(5, $this->collection[$coin]);
    }

    public function testSetGetQuantityWithModifications()
    {
        $coin = new Coin('foo', 10.10, 20.20, 30.30);

        $this->collection[$coin] = 5;
        $this->collection[$coin] = 10;

        $this->assertEquals(10, $this->collection[$coin]);
    }

    public function testSetGetQuantityIncrementingToOneFromUnset()
    {
        $coin = new Coin('foo', 10.10, 20.20, 30.30);

        $this->collection->increment($coin);

        $this->assertEquals(1, $this->collection[$coin]);
    }

    public function testSetGetQuantityIncrementingFromSet()
    {
        $coin = new Coin('foo', 10.10, 20.20, 30.30);

        $this->collection[$coin] = 5;
        $this->collection->increment($coin);

        $this->assertEquals(6, $this->collection[$coin]);
    }

    public function testIteration()
    {
        $coin1 = new Coin('foo', 10.10, 20.20, 30.30);
        $coin2 = new Coin('bar', 100.10, 200.20, 300.30);
        $coin3 = new Coin('baz', 1000.10, 2000.20, 3000.30);

        $this->collection[$coin1] = 5;
        $this->collection[$coin2] = 50;
        $this->collection[$coin3] = 500;

        $expectedQuantities = [
            'foo' => 5,
            'bar' => 50,
            'baz' => 500,
        ];

        $actualQuantities = [];

        foreach ($this->collection as $coin) {
            $actualQuantities[$coin->getName()] = $this->collection[$coin];
        }

        $this->assertEquals($expectedQuantities, $actualQuantities);
    }

    public function testGetQuantityArray()
    {
        $coin1 = new Coin('foo', 10.10, 20.20, 30.30);
        $coin2 = new Coin('bar', 100.10, 200.20, 300.30);
        $coin3 = new Coin('baz', 1000.10, 2000.20, 3000.30);

        $this->collection[$coin1] = 5;
        $this->collection[$coin2] = 50;
        $this->collection[$coin3] = 500;

        $expectedQuantities = [
            'foo' => 5,
            'bar' => 50,
            'baz' => 500,
        ];

        $this->assertEquals($expectedQuantities, $this->collection->getQuantities());
    }

    public function testSum()
    {
        $coin1 = new Coin('foo', 10.10, 20.20, 30.30);
        $coin2 = new Coin('bar', 100.10, 200.20, 300.30);
        $coin3 = new Coin('baz', 1000.10, 2000.20, 3000.30);

        $this->collection[$coin1] = 5;
        $this->collection[$coin2] = 50;
        $this->collection[$coin3] = 500;

        $expectedValue = (10.10 * 5) + (100.10 * 50) + (1000.10 * 500);

        $this->assertEquals($expectedValue, $this->collection->getSum());
    }

    public function testSumAndQuantitiesWithEmptyCoinCollection()
    {
        $coins = new CoinCollection([
            new Coin('foo', 100, 8.100,  2.00),
            new Coin('bar', 50,  11.340, 2.15),
            new Coin('baz', 25,  5.670,  1.75),
        ]);

        $this->collection->setCoinCollection($coins);

        $expectedQuantities = [
            'foo' => 0,
            'bar' => 0,
            'baz' => 0,
        ];

        $this->assertEquals(0, $this->collection->getSum());
        $this->assertEquals($expectedQuantities, $this->collection->getQuantities());
    }

    public function testSumAndQuantitiesWithPartiallyFilledCoinCollection()
    {
        $coins = new CoinCollection([
            $foo = new Coin('foo', 100, 8.100,  2.00),
            $bar = new Coin('bar', 50,  11.340, 2.15),
            $baz = new Coin('baz', 25,  5.670,  1.75),
        ]);

        $this->collection->setCoinCollection($coins);

        $this->collection[$foo] = 1;
        $this->collection[$baz] = 2;

        $expectedQuantities = [
            'foo' => 1,
            'bar' => 0,
            'baz' => 2,
        ];

        $this->assertEquals(150, $this->collection->getSum());
        $this->assertEquals($expectedQuantities, $this->collection->getQuantities());
    }


}
 