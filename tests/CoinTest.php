<?php

namespace CoinOptimizerTests;

use CoinOptimizer\Coin;


class CoinTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $coin = new Coin("foo", 10.10, 20.20, 30.30);

        $this->assertEquals("foo", $coin->getName());
        $this->assertEquals(10.10, $coin->getValue());
        $this->assertEquals(20.20, $coin->getWeight());
        $this->assertEquals(30.30, $coin->getThickness());

    }

    public function testSettersGetters()
    {
        $coin = new Coin();

        $coin->setName('foo');
        $coin->setValue(10.10);
        $coin->setWeight(20.20);
        $coin->setThickness(30.30);


        $this->assertEquals("foo", $coin->getName());
        $this->assertEquals(10.10, $coin->getValue());
        $this->assertEquals(20.20, $coin->getWeight());
        $this->assertEquals(30.30, $coin->getThickness());
    }

}
 