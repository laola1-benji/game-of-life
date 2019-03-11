<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 14:28
 */

namespace GameOfLife;
use GameOfLife\Lifeforms\LifeFormCreator;

class LifeFormLoader
{
    private $lifeCoordinates = [];

    /**
     * Load a life form into the board
     * @param string $lifeFormName
     * @param array $startPoint
     * @param array $board
     */
    public function loadLife($lifeFormName, $startPoint, $board){
        $factory = new LifeFormCreator();
        $this->lifeCoordinates = $factory->getForm($lifeFormName, $startPoint);
        $this->transformBoard($board, $this->lifeCoordinates);
    }

    /**
     * Set the cells status to alive according to coordinates
     * @param array $board
     * @param array $lifeCoordinates
     */
    private function transformBoard($board, $lifeCoordinates){
        for($i = 0; $i<sizeof($lifeCoordinates); $i++) {
            ($board[$lifeCoordinates[$i][0]][$lifeCoordinates[$i][1]])->setStatus("X");
        }
    }
}