<?php

use Mapper\NumberBuddyMapper;
use Number\Number;

class NumberBuddyMapperTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var NumberBuddyMapper
     */
    private $numberBuddyMapper = null;

    public function setup()
    {
        $pdo = new PDO(dsn, username, password);
        $this->numberBuddyMapper = new NumberBuddyMapper($pdo);
    }

    public function testCreate()
    {
        $result = $this->numberBuddyMapper->create(new Number(4));
        $this->assertTrue($result);
    }

    public function testReadByNumber()
    {
        $result = $this->numberBuddyMapper->readByNumber(new Number(4));
        $this->assertGreaterThan(0, count($result));

    }
} 
