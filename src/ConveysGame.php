<?php

namespace Ralph;

//require_once("GameField.php");
//require_once("Cell.php");

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
        $this->newGame = new GameField();
    }

    //methods
    
    public function readUserInput()
    {
        $out1 = "Enter how many lives you want to revive: ";

        echo $out1;
        $this->inputReviveCount = (int) readline();

        for ($i = 0; $i < $this->inputReviveCount; $i++) {
            $out2 = $i + 1 . ". (0 - 99) : ";

            echo $out2;
            $this->chosenPositions[] = (int)readline($i + 1 . ". (0 - 99) : ");
        }

        $out3 = "How many generations should be iterated through? : ";

        echo $out3;
        $this->chosenGenerations =(int)readline("How many generations should be iterated through? : ");
    }

    public function start()
    {
        foreach ($this->chosenPositions as $pos) {
            $this->currentGame->cellArray[$pos]->reviveCell();
        }

        echo "\n Board at start: \n";
        $this->currentGame->displayGameField();
        echo "----------------------------\n\nGame Start: \n";

        $this->iterate();
    }

    public function iterate()
    {
        for ($year = 0; $year < $this->chosenGenerations; $year++) {
            $this->transform();
            $this->currentGame->displayGameField();
        }
    }

    public function transform()
    {
        for ($year = 0; $year < 100; $year++) {
            $positionType = $this->getPositionType($j);
            $this->currentGame->countNeighborsOfCell($j, $positionType);
        }
        $this->newGame = $this->nextGeneration($this->currentGame, $this->newGame);
        $this->currentGame = $this->setAllNeighborToZero($this->newGame);
    }

    private function nextGeneration(GameField $oldField, GameField $newField)
    {
        for($cell = 0; $cell < 100; $cell++) {
            if ($oldField->cellArray[$cell]->isAlive === false) {
                if ($oldField->cellArray[$cell]->neighborCount === 3) {
                    $newField->cellArray[$cell]->reviveCell();
                }
            } else {
                if ($oldField->cellArray[$cell]->neighborCount > 3 || $oldField->cellArray[$cell]->neighborCount < 2) {
                    $newField->cellArray[$cell]->killCell();
                } else{
                    $newField->cellArray[$cell]->reviveCell();
                }
            }
        }

        return $newField;
    }

    private function getPositionType($key)
    {
        if ($key < 10) {                                        // oben //
            if ($key === 0) {
                $positionType = "top-left";                     // oben links //
            } elseif ($key === 9) {
                $positionType = "top-right";                    // oben rechts  //
            } elseif ($key > 0 && $key < 9) {
                $positionType = "top";
            } else {
                $positionType = "not-in-board";
            }
        } elseif ($key % 10 == 0 && $key !== 0 && $key !== 90) {   // links ohne Ecken //
            $positionType = "left";
        } elseif ($key % 10 == 9 && $key !== 99) {                 // rechts ohne Ecken //
            $positionType = "right";
        } elseif ($key > 89) {                                     // unten //
            if ($key === 90) {
                $positionType = "bottom-left";                  // unten links //
            } elseif ($key === 99) {
                $positionType = "bottom-right";                 // unten rechts //
            } elseif ($key > 89 && $key < 99) {
                $positionType = "bottom";                       // unten //
            } else {
                $positionType = "not-in-board";
            }
        } else {
            $positionType = "middle";                           // kein Rand //
        }
        return $positionType;
    }

    private function setAllNeighborToZero(GameField $gameField) {
        foreach ($gameField->cellArray as $cell) {
            $cell->neighborCount = 0;
        }
        return $gameField;
    }
}