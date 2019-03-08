<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 13:07
 */

namespace GameOfLife;


class Cell
{

    private $x;
    private $y;
    private $status;

    public function __construct($x, $y, $status = "O")
    {
        $this->x = $x;
        $this->y = $y;
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }


}