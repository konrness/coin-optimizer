<?php

namespace CoinOptimizerTests;

use CoinOptimizer\EuroCoinCollectionFactory;

class EuroCoinCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $coinCollection = EuroCoinCollectionFactory::create();

        $this->assertInstanceOf('CoinOptimizer\CoinCollection', $coinCollection);
        $this->assertCount(8, $coinCollection->getSortedCoins());

    }
}
