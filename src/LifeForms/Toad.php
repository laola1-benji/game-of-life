<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 11/03/2019
 * Time: 10:18
 */

namespace GameOfLife\LifeForms;


class Toad extends LifeForm
{
    public function __construct($x, $y){
        $this->startingXPosition=$x;
        $this->startingYPosition=$y;
        $this->declaringProperties();
        $this->generateForm();
        $this->activateCells();
    }

    public function declaringProperties(){
        $this->height = 2;
        $this->width = 4;
        $this->livingCells=[
            ["xPosition" => 0, "yPosition" => 0],
            ["xPosition" => 0, "yPosition" => 1],
            ["xPosition" => 0, "yPosition" => 2],
            ["xPosition" => 1, "yPosition" => 1],
            ["xPosition" => 1, "yPosition" => 2],
            ["xPosition" => 1, "yPosition" => 3]
        ];
    }
}