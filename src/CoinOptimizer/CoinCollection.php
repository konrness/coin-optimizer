<?php

namespace CoinOptimizer;

class CoinCollection
{

    /**
     * @var Coin[]
     */
    private $coins;

    /**
     * @param Coin[] $coins
     */
    public function __construct($coins = [])
    {
        $this->setCoins($coins);
    }

    /**
     * Get sorted coins, with the largest (highest value) first
     *
     * @return Coin[]
     */
    public function getSortedCoins()
    {
        $this->sortCoins();

        return $this->coins;
    }

    /**
     * @param Coin[] $coins
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;
    }

    /**
     * @param Coin $coin
     * @return void
     */
    public function addCoin(Coin $coin)
    {
        $this->coins[] = $coin;
    }

    /**
     * Sorts coins in descending value
     *
     * @return void
     */
    private function sortCoins()
    {
        usort(
            $this->coins,
            function (Coin $a, Coin $b) {
                if ($a->getValue() == $b->getValue()) {
                    // sort alphabetically by name if values match
                    return strcmp($a->getName(), $b->getName());
                }

                return $a->getValue() > $b->getValue() ? -1 : 1;
            }
        );
    }

} 