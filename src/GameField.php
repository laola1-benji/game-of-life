<?php

namespace Ralph;

//require_once("Cell.php");

class GameField
{
    //properties
    public $cellArray = [];

    //constructor
    function __construct()
    {
        $this->createGameField();
    }

    //methods
    public function createGameField()
    {
        for ($i = 0; $i < 100; $i++) {
            $this->cellArray[] = new Cell();
        }
    }

    public function displayGameField()
    {
        for ($f = 0; $f < 100; $f++) {
            if ($f % 10 == 0 && $f > 0) {
                echo "\n";
            }
            $this->cellArray[$f]->displayCell();
        }
        echo "\n";
        echo "\n";
    }

    public function countNeighborsOfCell($position, $type)
    {
        if ($type === "top-left") {
            $this->lookRight($position);
            $this->lookDownDiagonalRight($position);
            $this->lookDown($position);
        } elseif ($type === "top-right") {
            $this->lookDown($position);
            $this->lookDownDiagonalLeft($position);
            $this->lookLeft($position);
        } elseif ($type === "top") {
            $this->lookRight($position);
            $this->lookDownDiagonalRight($position);
            $this->lookDown($position);
            $this->lookDownDiagonalLeft($position);
            $this->lookLeft($position);
        } elseif ($type === "left") {
            $this->lookUp($position);
            $this->lookUpDiagonalRight($position);
            $this->lookRight($position);
            $this->lookDownDiagonalRight($position);
            $this->lookDown($position);
        } elseif ($type === "right") {
            $this->lookUp($position);
            $this->lookDown($position);
            $this->lookDownDiagonalLeft($position);
            $this->lookLeft($position);
            $this->lookUpDiagonalLeft($position);
        } elseif ($type === "bottom-left") {
            $this->lookUp($position);
            $this->lookUpDiagonalRight($position);
            $this->lookRight($position);
        } elseif ($type === "bottom-right") {
            $this->lookUp($position);
            $this->lookLeft($position);
            $this->lookUpDiagonalLeft($position);
        } elseif ($type === "bottom") {
            $this->lookUp($position);
            $this->lookUpDiagonalRight($position);
            $this->lookRight($position);
            $this->lookLeft($position);
            $this->lookUpDiagonalLeft($position);
        } elseif ($type === "middle") {
            $this->lookUp($position);
            $this->lookUpDiagonalRight($position);
            $this->lookRight($position);
            $this->lookDownDiagonalRight($position);
            $this->lookDown($position);
            $this->lookDownDiagonalLeft($position);
            $this->lookLeft($position);
            $this->lookUpDiagonalLeft($position);
        } else {
            echo "not possible";
        }
    }

    private function lookUp($position)
    {
        $lookPos = $position - 10;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }

    private function lookUpDiagonalRight($position)
    {
        $lookPos = $position - 9;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }

    private function lookRight($position)
    {
        $lookPos = $position + 1;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }

    private function lookDownDiagonalRight($position)
    {
        $lookPos = $position + 11;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }

    private function lookDown($position)
    {
        $lookPos = $position + 10;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }

    private function lookDownDiagonalLeft($position)
    {
        $lookPos = $position + 9;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }

    private function lookLeft($position)
    {
        $lookPos = $position - 1;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }

    private function lookUpDiagonalLeft($position)
    {
        $lookPos = $position - 11;
        if ($this->cellArray[$lookPos]->isAlive === true) {
            $this->cellArray[$position]->incrementNeighborCount();
        }
    }
}
