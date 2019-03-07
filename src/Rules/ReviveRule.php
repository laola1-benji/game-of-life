<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:06
 */
namespace GameOfLife\Rules;
class ReviveRule implements iRule
{
    public function applyRule($board, $height, $boardOfNeighbours)
    {
        // TODO: Implement applyRule() method.
        for($x = 0; $x < sizeof($board); $x++){
            for ($y = 0; $y <= $height; $y++) {
                if($board[$x][$y] == " O " && $boardOfNeighbours[$x][$y] == 3){
                    $board[$x][$y] = " X ";
                }
            }
        }
        return $board;
    }
}