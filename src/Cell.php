<?php

class Cell
{
    public $x;
    public $y;
    public $status;
    public $statusMessage;

    public function __construct($xPosition, $yPosition)
    {
        $this->x = $xPosition;
        $this->y = $yPosition;
    }

    public function checkStatus($status)
    {
        $this->statusMessage = $status ? "O" : "X";
        //echo $this->statusMessage;
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

    public function checkLifeNeighbors($generation)
    {
        $aliveNeighbors = 0;

        for ($i = -1; $i < 2; $i++) {
            for ($j = -1; $j < 2; $j++) {
                $column = ($this->x + $i + Grid::$width) % Grid::$width;
                $row = ($this->y + $j + Grid::$height) % Grid::$height;
                $aliveNeighbors += $generation[$column][$row];
            }
        }
        $aliveNeighbors -= $generation[$this->x][$this->y];
        return $aliveNeighbors;
    }

}