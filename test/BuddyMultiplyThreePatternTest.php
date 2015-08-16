<?php

use Number\BuddyPattern\MultiplyThree;
use Number\Number;

class BuddyMultiplyThreePatternTest extends PHPUnit_Framework_TestCase{

    private $multiplyThree = null;

    public function setup()
    {
        $this->multiplyThree = new MultiplyThree();
    }

    public function testCalculateBuddy()
    {
        $result = $this->multiplyThree->getBuddy(new Number(5),3);
        $this->assertEquals(18,$result);
    }

    /**
     * @expectedException Exception
     */
    public function testCalculateBuddyEmptyIndent()
    {
        $this->multiplyThree->getBuddy(new Number(5),0);

    }

} 
