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

                $board[$i][$j]->newStatus=false;
                if($board[$i][$j]->status===true){
                    if($board[$i][$j]->livingNeighbors===3 || $board[$i][$j]->livingNeighbors===2) {
                        $board[$i][$j]->newStatus = true;
                    }
                }else{
                    if($board[$i][$j]->livingNeighbors===3){
                        $board[$i][$j]->newStatus=true;
                    }
                }
            }
        }
    }
}