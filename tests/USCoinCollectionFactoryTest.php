<?php

namespace CoinOptimizerTests;

use CoinOptimizer\CoinCollection;
use CoinOptimizer\USCoinCollectionFactory;

class USCoinCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $coinCollection = USCoinCollectionFactory::create();

        $this->assertInstanceOf('CoinOptimizer\CoinCollection', $coinCollection);
        $this->assertCount(6, $coinCollection->getSortedCoins());

    }
}
