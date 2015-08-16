<?php

use Mapper\UserNumberMapper;
use Number\Number;

class UserNumberMapperTest extends PHPUnit_Framework_TestCase{

    /**
     * @var UserNumberMapper
     */
    private $userNumberMapper = null;

    public function setup()
    {
        $pdo = new PDO(dsn, username, password);
        $this->userNumberMapper = new UserNumberMapper($pdo);
    }

    public function testCreate()
    {
        $result = $this->userNumberMapper->create(1,1);
        $this->assertTrue($result);
    }
} 
