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

    /**
     * Cell constructor.
     * @param int $x
     * @param int $y
     * @param string $status
     */
    public function __construct($x, $y, $status = "O")
    {
        $this->x = $x;
        $this->y = $y;
        $this->status = $status;
    }

    /**
     * get the status of specific cell
     * @return string
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     * set the status of a specific cell
     * @param string $status
     */
    public function setStatus($status){
        $this->status = $status;
    }


}