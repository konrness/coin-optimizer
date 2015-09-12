<?php
/**
 * Challenge Yourselph - 019
 * Coin Optimization
 *
 * Write a class or function that will output the optimal coin combination (fewest number of coins) that fulfills a given dollar value.
 *
 * Usage: php optimize.php [input] [currency]
 * Example: php optimize.php 3.67
 *
 * @author Konr Ness <konr.ness@gmail.com>
 */

require_once __DIR__ . '/vendor/autoload.php';

use CoinOptimizer\CoinOptimizer;
use CoinOptimizer\EuroCoinCollectionFactory;
use CoinOptimizer\USCoinCollectionFactory;

$input    = (float) isset($argv[1]) ? $argv[1] : 0;
$currency = isset($argv[2]) ? $argv[2] : "usd";

switch ($currency) {
    case "usd":
        $coinCollection = USCoinCollectionFactory::create();
        break;
    case "euro":
        $coinCollection = EuroCoinCollectionFactory::create();
        break;
    default:
        echo "Invalid currency. Available options are 'usd' or 'euro'" . PHP_EOL;
        exit(1);
}

$coinOptimizer = new CoinOptimizer($coinCollection);

$coins = $coinOptimizer->optimize($input);

foreach ($coins as $coin) {
    echo $coin->getName() . ": " . $coins[$coin] . PHP_EOL;
}
