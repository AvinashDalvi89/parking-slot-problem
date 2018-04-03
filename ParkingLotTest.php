<?php
use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__).'/ParkingSlot.class.php';

class ParkingLotTest extends TestCase
{
    private $calculator;
 
    protected function setUp()
    {
        $this->parking = new ParkingSlot();
    }
 
    protected function tearDown()
    {
        $this->parking = NULL;
    }
 
    public function testCreateParkingSlot()
    {
        $result = $this->parking->createParkingSlot(4);
        $this->assertEquals(3, $result);
    }
 
}
?>