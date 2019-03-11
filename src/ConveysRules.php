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

    public function __construct(IBoard $newBoard)
    {
        $this->board = $newBoard;
    }

    public function iterateOneGeneration() {

    }

    private function countNeighborsOfAllCells() {
        //for ($i = 0; i < )
    }
}