<?php

namespace CoinOptimizer;

class QuantifiedCoinCollection extends \SplObjectStorage
{

    /**
     * Preset quantities for all coins to zero
     *
     * @param CoinCollection $coinCollection
     */
    public function setCoinCollection(CoinCollection $coinCollection)
    {
        foreach ($coinCollection->getSortedCoins() as $coin) {
            $this->addCoin($coin);
        }
    }

    /**
     * Add a coin and set quantity to zero
     *
     * @param Coin $coin
     * @return void
     */
    public function addCoin(Coin $coin)
    {
        if (! isset($this[$coin])) {
            $this[$coin] = 0;
        }
    }

    /**
     * Increment the quantity of given coin
     *
     * @param Coin $coin
     */
    public function increment(Coin $coin)
    {
        if (! isset($this[$coin])) {
            $this[$coin] = 0;
        }

        $this[$coin] = $this[$coin] + 1;
    }

    /**
     * Retrieve name and quantity of each coin
     *
     * @return array<string, int>
     */
    public function getQuantities()
    {
        $output = [];

        foreach ($this as $coin) {
            /** @var Coin $coin */
            $output[$coin->getName()] = $this[$coin];
        }

        return $output;
    }

    /**
     * Calculate sum of all coins
     *
     * @return float
     */
    public function getSum()
    {
        $sum = 0.00;

        foreach ($this as $coin) {
            $sum += ($coin->getValue() * $this[$coin]);
        }

        return $sum;
    }

} 