<?php
error_reporting(E_ALL);
require_once dirname(__FILE__).'/ParkingSlot.class.php';
$parking = new ParkingSlot();

$parking->createParkingSlot(4);

$parking_input = array(
     array('regNo'=> 'MH0312301', 'color'=>'Redvine'),
    array('regNo'=> 'HY0312601', 'color'=>'Blue'),
 array('regNo'=> 'KA0316301', 'color'=>'White'), array('regNo'=> 'DL0517301', 'color'=>'Red'),
     array('regNo'=> 'MH1213301', 'color'=>'Redvine')
);

for($i=0; $i<sizeof($parking_input);$i++){
    //echo "afa";
    //print_r($parking_input[$i]);
    $parking->doParking($parking_input[$i]['regNo'],$parking_input[$i]['color']);
}

$parking->leaveSlot(3);

$parking->getStatus();
?>