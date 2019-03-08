<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 14:28
 */

namespace GameOfLife;


use GameOfLife\Rules\Lifeforms\LifeFormFactory;

class Transformer
{
    private $board = [];
    private $lifeCoordinates = [];

    public function __construct($board)
    {
        $this->board = $board;
    }

    public function loadLife(){
        $factory = new LifeFormFactory();
        $this->lifeCoordinates = $factory->getForm("beehive");
        $this->transformBoard($this->board, $this->lifeCoordinates);
    }

    private function transformBoard(){

    }
}