<?php

namespace Number\BuddyPattern;


use Number\Number;

class MultiplyFive extends BuddyPattern{

    /**
     * @param Number $number
     * @param int $indent
     * @return int
     */
    protected function calculateBuddy(Number $number, $indent)
    {
        return $indent + ($indent * $number->getRoundedSquareRoot()) + 1;
    }
} 
