<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 08/03/2019
 * Time: 14:26
 */

namespace GameOfLife\LifeForms;


class Blinker extends LifeForm
{

    public function __construct($x, $y){
        $this->declaringProperties();
        $this->generateForm();
        $this->activateCells();
    }

    public function declaringProperties(){
        $this->height = 1;
        $this->width = 3;
        $this->livingCells=[
            ["xPosition" => 0, "yPosition" => 0],
            ["xPosition" => 0, "yPosition" => 1],
            ["xPosition" => 0, "yPosition" => 2]
        ];
    }

}