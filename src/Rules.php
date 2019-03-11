<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 08/03/2019
 * Time: 13:40
 */
namespace GameOfLife;

class Rules
{
    public static function applyRules($board){
        for($i=0;$i<count($board);$i++){
            for($j=0; $j<count($board[$i]);$j++){
                $board[$i][$j]->countLivingNeighbors($board, $i, $j);
            }
        }
    }
}