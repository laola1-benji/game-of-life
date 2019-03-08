<?php

class Cell
{
    public $x;
    public $y;
    public $status;
    public $statusMessage;

    /**
     * Cell constructor.
     * @param $xPosition
     * @param $yPosition
     * @throws Exception
     */
    public function __construct($xPosition, $yPosition)
    {
        $this->x = $xPosition;
        $this->y = $yPosition;
        $this->getRandomStatus();
    }

    public function checkStatus($status)
    {
        $this->statusMessage = $status ? "o" : "*";
    }

    /**
     * @throws Exception
     */
    public function getRandomStatus()
    {
        $r = random_int(0, 1);
        $this->status = ($r === 1) ? true : false;
        $this->checkStatus($this->status);
    }

    public function checkLifeNeighbors(Generation $generation)
    {
        $aliveNeighbors = 0;

        for ($i = -1; $i < 1; $i++) {
            for ($j = -1; $j < 1; $j++) {
                $column = ($this->x + $i + Grid::$width) % Grid::$width;
                $row = ($this->y + $j + Grid::$height) % Grid::$height;

                $aliveNeighbors += $generation->dna[$column][$row];
            }
        }
        $aliveNeighbors -= $generation->dna[$this->x][$this->y];
        return $aliveNeighbors;
    }
    /* public  function checkLifeNeighbors(Generation $generation,$x,$y) {
         $lifeNeighbors = 0;
         if($generation->dna[$x][$y -1] != 0) {
             $lifeNeighbors += 1;
         }if($generation->dna[$x -1][$y] != 0) {
             $lifeNeighbors += 1;
         }
         if($generation->dna[$x-1][$y+1] != 0) {
             $lifeNeighbors += 1;
         }if($generation->dna[$x][$y-1] != 0) {
             $lifeNeighbors += 1;
         }if($generation->dna[$x][$y+1] != 0) {
             $lifeNeighbors += 1;
         }if($generation->dna[$x+1][$y-1] != 0) {
             $lifeNeighbors += 1;
         }if($generation->dna[$x+1][$y] != 0) {
             $lifeNeighbors += 1;
         }if($generation->dna[$x+1][$y+1] != 0) {
             $lifeNeighbors += 1;
         }
         return $lifeNeighbors;
     }*/
}