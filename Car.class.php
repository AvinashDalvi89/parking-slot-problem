<?php

class Car {
        public $color;
        public $regNo;
        public function __construct($regNo, $color) {
            //echo $regNo."afsafsfs";
            $this->regNo = $regNo;
            $this->color = $color;
        }
    }

?>