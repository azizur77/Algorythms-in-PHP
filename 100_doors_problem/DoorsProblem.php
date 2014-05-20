<?php
/**
* 100 Doors Problem Solver 
* Problem:
* Suppose we have 100 doors and at the begining all of the doors are closed,
* in first step we walk through the hall and open each door so all doors are opened by the first pass,
* in second step we walk again and close each second door (2,4,6,8,10,...,100)
* in third step, we stop at every third door (3,6,9,12,...,99) and close it if it is open, and open it if it is closed
* continue this logic by the 100st step
* at the end which doors are open?
*
* Solution: 1,4,9,16,25,36,...,100 (Perfect square roots)
*/
class DoorsProblem {

    public $doors;

    public function __construct($doors = false){
        if(is_array($doors)){
            $this->doors = $doors;
        }else{
            $this->doors = $this->initGenerate();
        }
    }

    public function initGenerate(){
        return array_fill(1,100,0);
    }

    public function solveByLogic(){
        return $this->solveByLogicInStep(100);
    }

    public function solveByLogicInStep($step){
        for($i=1;$i<=$step;$i++){
            foreach($this->doors as $j => $door ){
                if((($j) % $i) == 0){
                    $this->doors[$j] = ($door?0:1);
                }
            }
        }
        $tmpChainDoors = new DoorsProblem($this->doors);
        return $tmpChainDoors;
    }

    public function OpensInComma(){
        $opens = array();
        foreach($this->doors as $door_num => $state){
            if ($state){
                $opens[] = $door_num;
            }
        }
        return implode(',', $opens);
    }
}
