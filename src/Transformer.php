<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 14:28
 */

namespace GameOfLife;
use GameOfLife\Lifeforms\LifeFormFactory;

class Transformer
{
    private $board = [];
    private $lifeCoordinates = [];

    public function __construct($board)
    {
        $this->board = $board;
    }

    public function loadLife(){
        $factory = new LifeFormFactory($this->lifeCoordinates);
        $this->lifeCoordinates = $factory->getForm("beacon");
        $this->transformBoard($this->board, $this->lifeCoordinates);

        return $this->board;
    }

    private function transformBoard($board, $lifeCoordinates){
        //var_dump($lifeCoordinates);
        //var_dump($board);
        for($i = 0; $i<sizeof($lifeCoordinates); $i++) {
            ($board[$lifeCoordinates[$i][0]][$lifeCoordinates[$i][1]])->setStatus("X");
        }

    }
}