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

    public function __construct($state)
    {
        $this->isAlive = $state;
    }

}