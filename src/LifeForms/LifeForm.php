<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 08/03/2019
 * Time: 14:35
 */

namespace GameOfLife\LifeForms;

use GameOfLife\Cell;


class LifeForm
{
    public $width;
    public $height;
    public $livingCells;
    public $area;

    public function generateForm(){
        for($i=0; $i<$this->height; $i++){
            for($j=0; $j<$this->width; $j++){
                $this->area[$i][$j]=new Cell();
            }
        }
    }

    public function activateCells(){

        //iterates LifeForm area
        $i=0;
        foreach($this->area as $line){
            $j=0;
            foreach($line as $cell){

                foreach($this->livingCells as $livingCell){
                    if($i === $livingCell['xPosition']&&$j === $livingCell['yPosition'])$cell->status=true;
                }
                $j++;
            }
            $i++;
        }
    }
}