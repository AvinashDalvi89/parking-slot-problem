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
        //$this->Car = new Car($regNo, $color);
    }
    public function createParkingSlot($totalSlots){
        try {
         $this->MAX_SIZE = $totalSlots;
        } catch (Exception $e) {
            echo "Total slots count is not valid!";
        }
        for ($i=1; i<= $this->MAX_SIZE; $i++) {
            array_push($this->freeSlot,$i);
            //$slotByCar[$i] = array('regNo'=> '', 'color'=> '');

        }
         
        echo "Created parking lot with " . $totalSlots . " slots";
        echo "\n";

    }

    public function doParking($regNo, $color){

        if ($this->MAX_SIZE == 0) {
            echo "Sorry, parking lot is not created";
            echo "\n";
        } else if (len($this->map1) == $this->MAX_SIZE) {
            echo "Sorry, parking lot is full";
            echo "\n";
        } else {
            //Collections.sort(availableSlotList);
            $this->freeSlot = sort($this->freeSlot); 
            $slot = $this->freeSlot[0];
            $carObj = new Car(regNo, color);
            this.map1.put(slot, car);
            $this->slotByCar[$slot] = $carObj;
            $this->slotByRegNo[$slot] = $regNo;
            array_push($this->colorByRegNo[$color],$regNo); 
            
            echo "Allocated slot number: " .slot;
            echo "\n";
            availableSlotList.remove(0);
            unset($this->freeSlot[0]);
        }

    }
    public function leaveSlot($slotNo) {
        if ($this->MAX_SIZE == 0) {
            echo "Sorry, parking lot is not created";
            echo "\n";
        } else if (this.map1.size() > 0) {
            $carToLeave = $this->slotByCar[$slotNo];
            if ($carToLeave != null) {
                this.map1.remove(slotNo);
                this.map2.remove(carToLeave.regNo);
                ArrayList<String> regNoList = this.map3.get(carToLeave.color);
                if (regNoList.contains(carToLeave.regNo)) {
                    regNoList.remove(carToLeave.regNo);
                }
                // Add the Lot No. back to available slot list.
                this.availableSlotList.add(Integer.parseInt(slotNo));
                System.out.println("Slot number " + slotNo + " is free");
                System.out.println();
            } else {
                System.out.println("Slot number " + slotNo + " is already empty");
                System.out.println();
            }
        } else {
            System.out.println("Parking lot is empty");
            System.out.println();
        }
    }
}
?>