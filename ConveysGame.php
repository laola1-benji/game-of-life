<?php
require_once("GameField.php");
require_once("Cell.php");

class ConveysGame
{
    //properties
    public $inputReviveCount;
    public $chosenPositions;
    public $chosenGenerations;
    public $currentGame;
    public $newGame;

    //ctor
    function __construct()
    {
        $this->currentGame = new GameField();
    }

    //methods
    public function readUserInput()
    {
        $out1 = "Enter how many lives you want to revive: ";

        echo $out1;
        $this->inputReviveCount = readline($out1);

        for ($i = 0; $i < $this->inputReviveCount; $i++) {
            $out2 = $i + 1 . ". (0 - 99) : ";

            echo $out2;
            $this->chosenPositions[] = readline($out2);
        }
        $out3 = "How many generations should be iterated through? : ";

        echo $out3;
        $this->chosenGenerations = readline($out3);
    }

    public function start()
    {
        foreach ($this->chosenPositions as $pos) {
            $this->currentGame->cellArray[$pos]->reviveCell();
        }

        $this->iterate();
    }

    public function iterate()
    {
        for ($i = 0; $i < $this->chosenGenerations; $i++) {
            $this->transform();
            $this->currentGame->displayGameField();
        }
    }

    public function transform()
    {
        for ($i = 0; $i < 100; $i++) {
            $positionType = $this->getPositionType($i);
            $this->currentGame->countNeighborsOfCell($i, $positionType);
        }
        $this->newGame = $this->nextGeneration($this->currentGame);
        $this->currentGame = $this->newGame;
    }

    private function nextGeneration(GameField $field)
    {
        $gameField = new GameField();

        for ($i = 0; $i < 100; $i++) {
            if ($this->currentGame->cellArray[$i]->isAlive === true) {
                if (!($this->currentGame->cellArray[$i]->neighborCount === 2 || $this->currentGame->cellArray[$i]->neighborCount === 3))
                {
                    $this->currentGame->cellArray[$i]->killCell();
                }
            } else {
                if (!($this->currentGame->cellArray[$i]->neighborCount === 3))
                {
                    $this->currentGame->cellArray[$i]->reviveCell();
                }
            }
        }

        return $gameField;
    }

    private function getPositionType($key)
    {
        if ($key < 10) {                                        // oben //
            if ($key === 0) {
                $positionType = "top-left";                     // oben links //
            } else if ($key === 9) {
                $positionType = "top-right";                    // oben rechts  //
            } else {
                $positionType = "top";
            }
        } elseif ($key % 10 == 0 && $key !== 0 && $key !== 90) {   // links ohne Ecken //
            $positionType = "left";
        } elseif ($key % 10 == 9) {                                // rechts ohne Ecken //
            $positionType = "right";
        } elseif ($key > 89) {                                     // unten //
            if ($key === 90) {
                $positionType = "bottom-left";                  // unten links //
            } elseif ($key === 99) {
                $positionType = "bottom-right";                 // unten rechts //
            } else {
                $positionType = "bottom";                       // unten //
            }
        } else {
            $positionType = "middle";                           // kein Rand
        }
        return $positionType;
    }
}