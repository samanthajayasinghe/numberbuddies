<?php
namespace Number;


class Number {

    /**
     * @var int
     */
    private $value = 0;

    /**
     * @var array
     */
    private $buddies = [];

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @return int
     */
    public function getRoundedSquareRoot()
    {
        return round($this->getSquareRoot());
    }

    /**
     * @return int
     */
    public function getSquareRoot()
    {
        return sqrt($this->getValue());
    }


    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return $this;
     */
    private function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getBuddies()
    {
        return $this->buddies;
    }/**
     * @param array $buddies
     * @return $this;
     */
    public function setBuddies($buddies)
    {
        $this->buddies = $buddies;
        return $this;
    }

} 
