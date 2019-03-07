<?php

namespace Ralph;

class Cell
{
    //properties
    public $isAlive;
    public $neighborCount;

    //constructor
    function __construct()
    {
        $this->isAlive = false;
        $this->neighborCount = 0;
    }

    //methods
    public function displayCell()
    {
        if ($this->isAlive === true) {
            echo " X ";
        } else {
            echo " . ";
        }
    }

    public function reviveCell()
    {
        if ($this->isAlive === false) {
            $this->isAlive = true;
        }
    }

    public function killCell()
    {
        if ($this->isAlive === true) {
            $this->isAlive = false;
        }
    }

    public function incrementNeighborCount()
    {
        $this->neighborCount++;
    }
}