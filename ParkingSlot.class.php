<?php
require_once('Car.class.php');
class ParkingSlot{
    const MAX_SIZE = 0;
    public $color;
    public $regNo;
    public $freeSlot = array();
    public $slotByCar = array();
    public $slotByRegNo = array();
    public $colorByRegNo = array();

    
    function __construct($regNo, $color) {
         
    }
    public function createParkingSlot($totalSlots){
        try {
         $this->MAX_SIZE = $totalSlots;
        } catch (Exception $e) {
            echo "Total slots count is not valid!";
        }
        for ($i=1; $i<= $this->MAX_SIZE; $i++) {
            array_push($this->freeSlot,$i);
            //$slotByCar[$i] = array('regNo'=> '', 'color'=> '');

        }
         
        echo "Created parking lot with " . $totalSlots . " slots";
        echo "<br>";

    }

    public function doParking($regNo, $color){

        if ($this->MAX_SIZE == 0) {
            echo "Sorry, parking lot is not created";
            echo "<br>";
        } else if (sizeof($this->slotByCar) == $this->MAX_SIZE) {
            echo "Sorry, parking lot is full";
            echo "<br>";
        } else {
            
            //Collections.sort(availableSlotList);
            sort($this->freeSlot); 
            //echo $regNo;
            //print_r($this->freeSlot);
            $slot = $this->freeSlot[0];
            $carObj = new Car($regNo, $color);
            print_r($carObj);
            $this->slotByCar[$slot] = $carObj;
            $this->slotByRegNo[$slot] = $regNo;
            array_push($this->colorByRegNo[$color],$regNo); 
            
            echo "Allocated slot number: " .$slot;
            echo "<br>";
            unset($this->freeSlot[0]);
        }

    }
    public function leaveSlot($slotNo) {
        if ($this->MAX_SIZE == 0) {
            echo "Sorry, parking lot is not created";
            echo "<br>";
        } else if (sizeof($this->slotByCar) > 0) {
            $carToLeave = $this->slotByCar[$slotNo];
            if ($carToLeave != null) {
                unset($this->slotByCar[$slotNo]);
                unset($this->slotByRegNo[$carToLeave->regNo]);
                unset($this->colorByRegNo[$carToLeave->color][$carToLeave->regNo]);
                // Add the Lot No. back to available slot list.
                array_push($this->freeSlot,$slotNo);
                echo "Slot number " . $slotNo . " is free";
                echo "<br>";
            } else {
                echo "Slot number " . $slotNo . " is already empty";
                echo "<br>";
            }
        } else {
            echo "Parking lot is empty";
            echo "<br>";
        }
    }

    public function getStatus() {
        if ($this->MAX_SIZE == 0) {
           echo "Sorry, parking lot is not created";
           echo "<br>";
        } else if (sizeof($this->slotByCar) > 0) {
            // Print the current status.
            echo "Slot No.\tRegistration No.\tColor";
            echo "<br>";
            $carObj = new Car($regNo, $color);
            //echo "<pre>";
            //print_r($this->slotByCar);
            for ($i = 1; $i <= $this->MAX_SIZE; $i++) {
                $key = $i;
                if (isset($this->slotByCar[$key])) {
                    //echo "fsafsaaf";
                    $carObj = $this->slotByCar[$key];
                    echo "".$i."\t" . $carObj->regNo . "\t" . $carObj->color;
                }
            }
            echo "<br>";
        } else {
            echo "Parking lot is empty";
            echo "<br>";
        }
    }
    public function getRegNoFromColor($color) {
        if ($this->MAX_SIZE == 0) {
            echo "Sorry, parking lot is not created";
            echo "<br>";
        } else if (isset($this->colorByRegNo[$color])) {
            $regNoList = $this->colorByRegNo[$color];
            echo "<br>";
            for ($i=0; $i < sizeof($regNoList); $i++) {
                if (!(i==(sizeof($regNoList) - 1))){
                 echo $regNoList[$i] . ",";
                } else {
                    echo $regNoList[$i];
                }
            }
        } else {
            echo "Not found";
            echo "<br>";
        }
    }

    public function getSlotsByColor($color) {
        if ($this->MAX_SIZE == 0) {
            echo "Sorry, parking lot is not created";
            echo "<br>";
        } else if (isset($this->colorByRegNo[$color])) {
            $regNoList = $this->colorByRegNo[$color];
            $slotList = array();
            echo "<br>";
            for ($i=0; i < sizeof($regNoList); $i++) {
                array_push($slotList,$this->slotByRegNo[$regNoList[$i]]);
                
            }
            sort($slotList); 
            for ($j=0; $j < sizeof($slotList); $j++) {
                if (!($j == sizeof($slotList) - 1)) {
                    echo $slotList[$j] . ",";
                } else {
                    echo $slotList[$j];
                }
            }
            echo "<br>";
        } else {
            echo "Not found";
            echo "<br>";
        }
    }

    public function getSlotsByRegNo($regNo) {
        if ($this->MAX_SIZE == 0) {
            echo "Sorry, parking lot is not created";
            echo "<br>";
        } else if (isset($this->slotByRegNo[$regNo])) {
            echo $this->slotByRegNo[$regNo];
        } else {
            echo "Not found";
            echo "<br>";
        }
    }
}
?>