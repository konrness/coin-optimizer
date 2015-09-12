<?php
namespace CoinOptimizerTests;

use CoinOptimizer\CoinOptimizer;
use CoinOptimizer\USCoinCollectionFactory;

class CoinOptimizerTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $coinCollection = USCoinCollectionFactory::create();
        $coinOptimizer = new CoinOptimizer($coinCollection);

        $this->assertEquals($coinCollection, $coinOptimizer->getCoinCollection());
    }

    public function testGetterSetter()
    {
        $coinCollection = USCoinCollectionFactory::create();
        $coinOptimizer = new CoinOptimizer();

        $coinOptimizer->setCoinCollection($coinCollection);

        $this->assertEquals($coinCollection, $coinOptimizer->getCoinCollection());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Coin collection not set
     */
    public function testGetterThrowsExceptionOnUnset()
    {
        $coinOptimizer = new CoinOptimizer();

        $coinOptimizer->getCoinCollection();
    }

    /**
     * @covers \CoinOptimizer\CoinOptimizer
     */
    public function testValuesSortedFloat()
    {
        $coinOptimizer = new CoinOptimizer(USCoinCollectionFactory::create());

        $optimizedCoins = $coinOptimizer->optimize(3.67);

        $expectedQuantities = [
            'silver-dollar' => 3,
            'half-dollar' => 1,
            'quarter' => 0,
            'dime' => 1,
            'nickel' => 1,
            'penny' => 2,
        ];

        $this->assertEquals(3.67, $optimizedCoins->getSum());
        $this->assertEquals($expectedQuantities, $optimizedCoins->getQuantities());

    }

    /**
     * @covers \CoinOptimizer\CoinOptimizer
     */
    public function testValuesSortedSmall()
    {
        $coinOptimizer = new CoinOptimizer(USCoinCollectionFactory::create());

        $optimizedCoins = $coinOptimizer->optimize(0.01);

        $expectedQuantities = [
            'silver-dollar' => 0,
            'half-dollar' => 0,
            'quarter' => 0,
            'dime' => 0,
            'nickel' => 0,
            'penny' => 1,
        ];

        $this->assertEquals(0.01, $optimizedCoins->getSum());
        $this->assertEquals($expectedQuantities, $optimizedCoins->getQuantities());

    }


    /**
     * @covers \CoinOptimizer\CoinOptimizer
     */
    public function testValuesSortedAll()
    {
        $coinOptimizer = new CoinOptimizer(USCoinCollectionFactory::create());

        $optimizedCoins = $coinOptimizer->optimize(1.91);

        $expectedQuantities = [
            'silver-dollar' => 1,
            'half-dollar' => 1,
            'quarter' => 1,
            'dime' => 1,
            'nickel' => 1,
            'penny' => 1,
        ];

        $this->assertEquals(1.91, $optimizedCoins->getSum());
        $this->assertEquals($expectedQuantities, $optimizedCoins->getQuantities());

    }


    /**
     * @covers \CoinOptimizer\CoinOptimizer
     */
    public function testValuesSortedNone()
    {
        $coinOptimizer = new CoinOptimizer(USCoinCollectionFactory::create());

        $optimizedCoins = $coinOptimizer->optimize(0.00);

        $expectedQuantities = [
            'silver-dollar' => 0,
            'half-dollar' => 0,
            'quarter' => 0,
            'dime' => 0,
            'nickel' => 0,
            'penny' => 0,
        ];

        $this->assertEquals(0.00, $optimizedCoins->getSum());
        $this->assertEquals($expectedQuantities, $optimizedCoins->getQuantities());

    }

}
 