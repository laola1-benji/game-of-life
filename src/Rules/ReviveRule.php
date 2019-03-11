<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:06
 */
namespace GameOfLife\Rules;
use GameOfLife\Board;
class ReviveRule implements iRule
{
    /**
     * Apply the revive rule by changing dead cells to alive
     * @param array $board
     * @param array $boardOfNeighbours
     */
    public function applyRule($board, $boardOfNeighbours)
    {
        // TODO: Implement applyRule() method.
        for($x = 0; $x < sizeof($board); $x++){
            for ($y = 0; $y < Board::getHeight(); $y++) {
                if(($board[$x][$y])->getStatus() == "O" && $boardOfNeighbours[$x][$y] == 3){
                    ($board[$x][$y])->setStatus("X");
                }
            }
        }
    }
}