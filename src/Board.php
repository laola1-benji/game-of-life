<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 13:05
 */
namespace GameOfLife;

class Board
{
    private $width;
    private $height;
    private static $bHeight;

    private $board = [];

    /**
     * Board constructor.
     * @param int $width
     * @param int $height
     */
    public function __construct($width, $height)
    {
        $this->height = $height;
        $this->width = $width;
        self::$bHeight = $height;
        $this->createBoard();
    }

    /**
     *Create a board with the set dimensions
     */
    private function createBoard(){
        for($i = 0; $i<$this->width; $i++){
            for($j = 0; $j<$this->height; $j++){
                $this->board[$i][$j] = new Cell($i, $j, "O");
            }
        }
        $this->printBoard();
    }

    /**
     *Display the board with its current status
     */
    private function printBoard() {
        for($i = 0; $i<$this->width; $i++){
            for($j = 0; $j<$this->height; $j++){
                echo " " . ($this->board[$i][$j])->getStatus() . " ";
            }
            echo "\n";
        }
        echo "\n\n";
    }

    /**
     * Fill board with
     * @param string $lifeFormName
     * @param array $startPoint
     */
    public function fillBoard($lifeFormName, $startPoint){
        $lifeforms = new LifeFormLoader();
        $lifeforms->loadLife($lifeFormName, $startPoint, $this->board);
        $this->printBoard();
    }

    /**
     *Go through one life cycle using the game rules
     */
    public function oneLifeCycle(){
        $lifeCycle = new Referee();
        $lifeCycle->applyAllRules($this->board);
        $this->printBoard();
    }

    /**
     * @return int
     */
    public static function getHeight(){
        return self::$bHeight;
    }
}