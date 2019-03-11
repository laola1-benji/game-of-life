<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 14:28
 */

namespace GameOfLife;
use GameOfLife\Lifeforms\LifeFormCreator;

class Transformer
{
    private $lifeCoordinates = [];

    public function loadLife($board){
        $factory = new LifeFormCreator();
        $this->lifeCoordinates = $factory->getForm("beacon");
        $this->transformBoard($board, $this->lifeCoordinates);
    }

    private function transformBoard($board, $lifeCoordinates){
        for($i = 0; $i<sizeof($lifeCoordinates); $i++) {
            ($board[$lifeCoordinates[$i][0]][$lifeCoordinates[$i][1]])->setStatus("X");
        }
    }
}