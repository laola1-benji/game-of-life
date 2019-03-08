<?php

class Grid
{
    public $firstGeneration;
    public $nextGeneration;
    public $currentGeneration;
    public $rules;
    public $isfFirstGeneration = false;
    public static $width = 10;
    public static $height = 10;

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
        $this->createGeneration($this->firstGeneration, true);
        $this->createGeneration($this->nextGeneration);
    }

    public function Start()
    {
        $this->compareGenerations($this->nextGeneration);
    }

    /**
     * @param $generation
     * @param bool $firstCreation
     * @throws Exception
     */
    function createGeneration(Generation $generation, $firstCreation = false)
    {
        $generation->dna = $this->create2DArray(Grid::$width, Grid::$height);
        for ($i = 0; $i < Grid::$height; $i++) {
            echo "\n";
            for ($j = 0; $j < Grid::$width; $j++) {
                $generation->cells = $this->create2DArray($i, $j);
                $cell = new Cell($i, $j);
                $generation->cells[$i][$j] = $cell;
                //echo get_class($generation->cells[$i][$j]);
                if ($firstCreation) {
                    $this->currentGeneration->dna = $generation->dna;
                    echo($cell->statusMessage);

                } else {
                    $cell->checkStatus($cell->status);
                }
            }
        }
    }

    /**
     * @param $generation
     * @throws Exception
     */
    public function compareGenerations(Generation $generation)
    {
        $this->checkForGeneration($generation);
        for ($i = 0; $i < Grid::$height; $i++) {
            for ($j = 0; $j < Grid::$width; $j++) {
                $cell = new Cell($i, $j);;
                $neighbors = $cell->checkLifeNeighbors($this->currentGeneration);
                $this->rules->checkForRules($neighbors, $cell->status);
                $this->currentGeneration->cells[$i][$j] = $cell;
                echo $cell->statusMessage;
            }
        }
        sleep(1);
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

    function checkForGeneration(Generation $generation)
    {
        if ($this->isfFirstGeneration) {
            $generation = $this->firstGeneration;
            $this->currentGeneration = $this->nextGeneration;
            $this->isfFirstGeneration = false;
        } else {
            $generation = $this->nextGeneration;
            $this->currentGeneration = $this->firstGeneration;
            $this->isfFirstGeneration = true;
        }
    }


}


