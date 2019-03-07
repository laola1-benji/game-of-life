<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 16:21
 */
namespace GameOfLife\LifeForm;

class LifeForm
{
    private $name;
    private $pointCoordinates = [];

    function __construct($name)
    {
        $this->name = $name;
        switch ($this->name){
            case "beehive" : $this->load($name);
            break;
            case "beacon" :$this->load($name);
            break;
        }
    }

    public function getLifeForm(){
        return $this->pointCoordinates;

    }

    private function load($name){
        $filename = dirname(__DIR__) . '\lifeform\\' . $name . ".csv";
        echo "Loading file: " . $filename . "\n";
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $columns = count($row);
                $xCoordinate = "";
                $yCoordinate = "";
                for ($c=0; $c < $columns; $c++) {
                    if($c == 0){
                        $xCoordinate = $row[$c];
                    }
                    if ($c == 1){
                        $yCoordinate = $row[$c];
                        array_push($this->pointCoordinates, array($xCoordinate, $yCoordinate));
                    }
                }
            }
            fclose($handle);
        }
    }

}