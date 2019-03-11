<?php
/**
 * Created by PhpStorm.
 * User: michael.schwartz
 * Date: 08.03.2019
 * Time: 16:05
 */
namespace GameOfLife;

class ConveysRules
{
    public $board;

    public function __construct(Board $newBoard)
    {
        $this->board = $newBoard;
    }

    public function displayGenerations() {

    }

    public function iterateOneGeneration() {
        
    }

    private function countNeighborsOfAllCells() {
        for ($position = 0; $position > $this->board->numberOfCells; $position++) {
            $upLeftPosition = $position - 11;
            $upPosition = $position - 10;
            $upRightPosition = $position - 9;
            $leftPosition = $position - 1;
            $rightPosition = $position + 1;
            $downLeftPosition = $position + 9;
            $downPosition = $position + 10;
            $downRightPosition = $position + 11;

            //oben links
            if (isset($this->board->cells[$upLeftPosition]) && $this->board->cells[$upLeftPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }

            //oben
            if (isset($this->board->cells[$upPosition]) && $this->board->cells[$upPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }

            //oben rechts
            if (isset($this->board->cells[$upRightPosition]) && $this->board->cells[$upRightPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }

            //links
            if (isset($this->board->cells[$leftPosition]) && $this->board->cells[$leftPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }

            //rechts
            if (isset($this->board->cells[$rightPosition]) && $this->board->cells[$rightPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }

            //links unten
            if (isset($this->board->cells[$downLeftPosition]) && $this->board->cells[$$downLeftPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }

            //unten
            if (isset($this->board->cells[$downPosition]) && $this->board->cells[$downPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }

            //rechts unten
            if (isset($this->board->cells[$downRightPosition]) && $this->board->cells[$downRightPosition]->isAlive === true) {
                $this->board->cells[$position]->incrementNeighbor();
            }
        }
    }
}