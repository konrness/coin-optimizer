<?php

namespace CoinOptimizerTests;

use CoinOptimizer\USCoinCollectionFactory;

class USCoinCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $coinCollection = USCoinCollectionFactory::create();

        $this->assertCount(6, $coinCollection->getSortedCoins());

    }
}
