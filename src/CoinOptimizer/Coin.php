<?php

namespace CoinOptimizer;

class Coin {

    /**
     * @var string
     */
    private $name;

    /**
     * Value ($0.05 = 0.05)
     *
     * @var float
     */
    private $value;

    /**
     * Weight in grams
     *
     * @var float
     */
    private $weight;

    /**
     * Thickness in millimeters
     *
     * @var float
     */
    private $thickness;

    /**
     * @param string $name
     * @param float $value
     * @param float $weight
     * @param float $thickness
     */
    function __construct($name = null, $value = null, $weight = null, $thickness = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->weight = $weight;
        $this->thickness = $thickness;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getThickness()
    {
        return $this->thickness;
    }

    /**
     * @param float $thickness
     */
    public function setThickness($thickness)
    {
        $this->thickness = $thickness;
    }

}