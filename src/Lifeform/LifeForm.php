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

    /**
     * LifeForm constructor.
     * @param string $name
     */
    function __construct($name)
    {
        $this->name = $name;
        switch ($this->name){
            case "beehive" : $this->load($name);
            break;
            case "beacon" :$this->load($name);
            break;
            case "pulsar" :$this->load($name);
            break;
        }
    }

    /**
     * Return list of alive Points with its coordinates
     * @return array
     */
    public function getLifeForm(){
        return $this->pointCoordinates;
    }

    /**
     * Load a life form from the Lifeform directory and save it inside the array of point coordinates
     * @param string $name
     */
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