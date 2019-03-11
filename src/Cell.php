<?php
/**
 * Created by PhpStorm.
 * User: michael.schwartz
 * Date: 08.03.2019
 * Time: 16:06
 */
namespace GameOfLife;

class Cell
{
    public $isAlive;
    public $neighbor;

    public function __construct($state)
    {
        $this->isAlive = $state;
        $this->neighbor = 0;
    }

    public function incrementNeighbor() {
        $this->neighbor++;
    }
}