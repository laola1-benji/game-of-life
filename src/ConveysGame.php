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
        $this->chosenGenerations = (int)readline("How many generations should be iterated through? : ");
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
        var_dump($this->chosenGenerations);
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
                if (!($this->currentGame->cellArray[$i]->neighborCount === 2 || $this->currentGame->cellArray[$i]->neighborCount === 3)) {
                    $gameField->cellArray[$i] = $field->cellArray[$i]->killCell();
                }
            } else {
                if (!($this->currentGame->cellArray[$i]->neighborCount === 3)) {
                    $gameField->cellArray[$i] = $field->cellArray[$i]->reviveCell();
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
            } elseif ($key === 9) {
                $positionType = "top-right";                    // oben rechts  //
            } elseif ($key > 0 && $key < 9) {
                $positionType = "top";
            } else {
                $positionType = "not-in-board";
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
            } elseif ($key > 89 && $key < 99) {
                $positionType = "bottom";                       // unten //
            } else {
                $positionType = "not-in-board";
            }
        } else {
            $positionType = "middle";                           // kein Rand
        }
        return $positionType;
    }
}