<?php

use Number\BuddyPattern\MultiplyThreeAndFive;
use Number\Number;

class BuddyMultiplyThreeAndFivePatternTest extends PHPUnit_Framework_TestCase{

    private $multiplyThreeAndFive = null;

    public function setup()
    {
        $this->multiplyThreeAndFive = new MultiplyThreeAndFive();
    }

    public function testCalculateBuddy()
    {
        $result = $this->multiplyThreeAndFive->getBuddy(new Number(17),15);
        $this->assertEquals(917, $result);
    }

    /**
     * @expectedException Exception
     */
    public function testCalculateBuddyEmptyIndent()
    {
        $this->multiplyThreeAndFive->getBuddy(new Number(11),0);

    }

} 
