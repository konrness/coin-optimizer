# Coin Optimizer

[![Build Status](https://travis-ci.org/konrness/coin-optimizer.svg?branch=master)](https://travis-ci.org/konrness/coin-optimizer)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/30968ed2-300c-4f56-baaf-fc5c848db850/mini.png)](https://insight.sensiolabs.com/projects/30968ed2-300c-4f56-baaf-fc5c848db850)


The coin optimizer will output the optimal coin combination (fewest number of coins) that fulfills a given dollar value. This was created for The Nerdery's code golf challenge #19.

## Installation

Install the vendor dependencies with Composer:

```
$ composer install
```

## Usage

```
$ php optimize.php 3.67
silver-dollar: 3
half-dollar: 1
quarter: 0
dime: 1
nickel: 1
penny: 2

```

## Advanced Usage

Coin Optimizer supports any currency denominations. It currently supports USD coins and Euro coins. To optimize Euro coins, provide the currency parameter:

```
$ php optimize.php 3.67 euro
two-euro: 1
one-euro: 1
fifty-cent-euro: 1
twenty-cent-euro: 0
ten-cent-euro: 1
five-cent-euro: 1
two-cent-euro: 1
one-cent-euro: 0
```
