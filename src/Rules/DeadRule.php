<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:06
 */
namespace GameOfLife\Rules;
use GameOfLife\Board;

class DeadRule implements iRule
{
    /**
     * Apply the kill rule by changing alive cells to the dead status
     * @param array $board
     * @param array $boardOfNeighbours
     */
    public function applyRule($board, $boardOfNeighbours)
    {
        // TODO: Implement applyRule() method.
        for($x = 0; $x < sizeof($board); $x++){
            for ($y = 0; $y < Board::getHeight(); $y++) {
                if(($board[$x][$y])->getStatus() == "X" && $boardOfNeighbours[$x][$y] < 2){
                    ($board[$x][$y])->setStatus("O");
                }
                if(($board[$x][$y])->getStatus() == "X" && $boardOfNeighbours[$x][$y]>3){
                    ($board[$x][$y])->setStatus("O");
                }
            }
        }
    }
}