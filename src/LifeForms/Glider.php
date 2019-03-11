<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 11/03/2019
 * Time: 10:25
 */

namespace GameOfLife\LifeForms;


class Glider extends LifeForm
{
    public function __construct($x, $y){
        $this->startingXPosition=$x;
        $this->startingYPosition=$y;
        $this->declaringProperties();
        $this->generateForm();
        $this->activateCells();
    }

    public function declaringProperties(){
        $this->height = 3;
        $this->width = 3;
        $this->livingCells=[
            ["xPosition" => 0, "yPosition" => 1],
            ["xPosition" => 1, "yPosition" => 2],
            ["xPosition" => 2, "yPosition" => 0],
            ["xPosition" => 2, "yPosition" => 1],
            ["xPosition" => 2, "yPosition" => 2]
        ];
    }

}