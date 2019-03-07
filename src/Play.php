<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 07.03.2019
 * Time: 07:24
 */

class Play{

    public static function checkLivingNeighbors($cellSurrounding){
        $i=0;
        foreach($cellSurrounding as $line){
            $j=0;
            foreach($line as $cell){
                if(isset($cellSurrounding[$i-1][$j-1])&&$cellSurrounding[$i-1][$j-1]->isAlive===true)$cell->livingNeighbors++;
                if(isset($cellSurrounding[$i-1][$j])&&$cellSurrounding[$i-1][$j]->isAlive===true)$cell->livingNeighbors++;
                if(isset($cellSurrounding[$i-1][$j+1])&&$cellSurrounding[$i-1][$j+1]->isAlive===true)$cell->livingNeighbors++;
                if(isset($cellSurrounding[$i][$j-1])&&$cellSurrounding[$i][$j-1]->isAlive===true)$cell->livingNeighbors++;
                if(isset($cellSurrounding[$i][$j+1])&&$cellSurrounding[$i][$j+1]->isAlive===true)$cell->livingNeighbors++;
                if(isset($cellSurrounding[$i+1][$j-1])&&$cellSurrounding[$i+1][$j-1]->isAlive===true)$cell->livingNeighbors++;
                if(isset($cellSurrounding[$i+1][$j])&&$cellSurrounding[$i+1][$j]->isAlive===true)$cell->livingNeighbors++;
                if(isset($cellSurrounding[$i+1][$j+1])&&$cellSurrounding[$i+1][$j+1]->isAlive===true)$cell->livingNeighbors++;
                $j++;
            }
            $i++;
        }
    }

    public static function rules($board){
        foreach($board as $line){
            foreach($line as $cell){
                if($cell->isAlive===false){
                    if($cell->livingNeighbors === 3){
                        $cell->newStatus=true;
                    }
                }else{
                    if($cell->livingNeighbors < 2){
                        $cell->newStatus=false;
                    }elseif($cell->livingNeighbors > 3){
                        $cell->newStatus=false;
                    }else{
                        $cell->newStatus=true;
                    }
                }
            }
        }
    }
}