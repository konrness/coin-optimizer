<?php

namespace CoinOptimizer;

class CoinOptimizer
{

    /**
     * @var CoinCollection
     */
    private $coinCollection;

    /**
     * @param CoinCollection $coinCollection
     */
    public function __construct(CoinCollection $coinCollection = null)
    {
        if ($coinCollection) {
            $this->setCoinCollection($coinCollection);
        }
    }

    /**
     * @return CoinCollection
     */
    public function getCoinCollection()
    {
        if (! $this->coinCollection) {
            throw new \UnexpectedValueException("Coin collection not set");
        }
        return $this->coinCollection;
    }

    /**
     * @param CoinCollection $coinCollection
     */
    public function setCoinCollection(CoinCollection $coinCollection)
    {
        $this->coinCollection = $coinCollection;
    }

    /**
     * @param float $value
     * @return QuantifiedCoinCollection
     */
    public function optimize($value)
    {
        $valueRemaining = $value;

        $optimizedCoins = new QuantifiedCoinCollection();
        $optimizedCoins->setCoinCollection($this->coinCollection);

        foreach ($this->getCoinCollection()->getSortedCoins() as $coin) {
            /** @var Coin $coin */

            // increment quantity of coin if value is not yet exceeded
            // use bc math to prevent floating point inaccuracies
            while (bccomp($valueRemaining, $coin->getValue(), 2) >= 0) {
                $optimizedCoins->increment($coin);
                $valueRemaining = bcsub($valueRemaining, $coin->getValue(), 2);
            }
        }

        return $optimizedCoins;
    }

}
