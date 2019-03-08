<?php

class Grid
{
    public $firstGeneration;
    public $nextGeneration;
    public $currentGeneration;
    public $rules;
    public static $width = 10;
    public static $height = 10;

    //public $resolution = 50;

    /**
     * Main constructor.
     * @throws Exception
     */
    function __construct()
    {
        $this->firstGeneration = new Generation();
        $this->nextGeneration = new Generation();
        $this->currentGeneration = new Generation();
        $this->currentGeneration = $this->firstGeneration;
        $this->rules = new Rules();
        $this->setupGrid();
    }

    /**
     * @throws Exception
     */
    function setupGrid()
    {
        echo "Grid Setup \n";
        $this->createGeneration($this->firstGeneration, true);
        $this->createGeneration($this->nextGeneration);

    }

    /**
     * @param $generation
     * @param bool $firstCreation
     * @throws Exception
     */
    function createGeneration(Generation $generation, $firstCreation = false)
    {
        $generation->generation = $this->create2DArray(Grid::$width, Grid::$height);
        for ($i = 0; $i < Grid::$height; $i++) {
            for ($j = 0; $j < Grid::$width; $j++) {
                $cell = new Cell($i, $j);
                $generation->cell = $cell;
                if ($firstCreation) {

                    $cell->getRandomStatus();
                    $this->currentGeneration->generation = $generation;
                    echo($cell->statusMessage);

                } else {
                    $cell->checkStatus($cell->status);
                }
            }
        }
    }

    /**
     * @param $generation
     */
    public function compareGenerations(Generation $generation)
    {

        for ($i = 0; $i < Grid::$height; $i++) {
            for ($j = 0; $j < Grid::$width; $j++) {

                $cell = $this->currentGeneration[$i][$j]->cell;
               // $neighbors = $cell->checkLifeNeighbors($this->currentGeneration);
               // $this->rules->checkForRules($neighbors,$cell->status);
                echo $cell->statusMessage;
            }
        }
        $this->currentGeneration = $generation;
        $this->compareGenerations($generation);


    }

    function create2DArray($height, $width)
    {
        $array2D = array($height);

        for ($i = 0; $i < count($array2D); $i++) {
            $array2D[$i] = array($width);

        }

        return $array2D;
    }


}


