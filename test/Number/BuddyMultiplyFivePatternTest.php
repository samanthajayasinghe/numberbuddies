<?php

use Number\BuddyPattern\MultiplyFive;
use Number\Number;

class BuddyMultiplyFivePatternTest extends PHPUnit_Framework_TestCase{

    private $multiplyFive = null;

    public function setup()
    {
        $this->multiplyFive = new MultiplyFive();
    }

    public function testCalculateBuddy()
    {
        $result = $this->multiplyFive->getBuddy(new Number(11),5);
        $this->assertEquals(21,$result);
    }

    /**
     * @expectedException Exception
     */
    public function testCalculateBuddyEmptyIndent()
    {
        $this->multiplyFive->getBuddy(new Number(11),0);

    }

} 
