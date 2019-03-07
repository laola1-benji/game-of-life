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
        for ($i = 0; $i < 100; $i ++) {
            if ($i % 10 == 0 && $i > 0) {
                echo "\n";
            }
            $this->cellArray[$i]->displayCell();
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
            $this->lookDownDiagonalLeft($position);
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
        if ($this->cellArray[$position - 10]->isAlive) {
            $this->cellArray[$position - 10]->incrementNeighborCount();
        }
    }

    private function lookUpDiagonalRight($position)
    {
        if ($this->cellArray[$position - 9]->isAlive) {
            $this->cellArray[$position - 9]->incrementNeighborCount();
        }
    }

    private function lookRight($position)
    {
        if ($this->cellArray[$position + 1]->isAlive) {
            $this->cellArray[$position + 1]->incrementNeighborCount();
        }
    }

    private function lookDownDiagonalRight($position)
    {
        //if (isset($this->cellArray[$position + 11]->isAlive)) {
            if ($this->cellArray[$position + 11]->isAlive) {
                $this->cellArray[$position + 11]->incrementNeighborCount();
            }
        //}
    }

    private function lookDown($position)
    {
       //if (isset($this->cellArray[$position + 11]->isAlive)) {
            if ($this->cellArray[$position + 10]->isAlive) {
                $this->cellArray[$position + 10]->incrementNeighborCount();
            }
        //}
    }

    private function lookDownDiagonalLeft($position)
    {
        //if (isset($this->cellArray[$position + 11]->isAlive)) {
            if ($this->cellArray[$position + 9]->isAlive) {
                $this->cellArray[$position + 9]->incrementNeighborCount();
            }
        //}
    }

    private function lookLeft($position)
    {
        if ($this->cellArray[$position - 1]->isAlive) {
            $this->cellArray[$position - 1]->incrementNeighborCount();
        }
    }

    private function lookUpDiagonalLeft($position)
    {
        if ($this->cellArray[$position - 11]->isAlive) {
            $this->cellArray[$position - 11]->incrementNeighborCount();
        }
    }
}
