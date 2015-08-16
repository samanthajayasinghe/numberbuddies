<?php

use Number\Number;
use Service\BuddyComputeService;

class BuddyComputeServiceTest extends PHPUnit_Framework_TestCase{

    private $buddyService = null;

    public  function setup()
    {
        $this->buddyService = new BuddyComputeService();
    }
    public function testGenerateBuddy()
    {
        $result = $this->buddyService->generateBuddies(new Number(10));
        $this->assertEquals([33,21,66,99,41],$result);
    }

    public function testGenerateBuddyFor900()
    {
        $result = $this->buddyService->generateBuddies(new Number(900));
        $this->assertEquals(540,count($result));
    }
} 
