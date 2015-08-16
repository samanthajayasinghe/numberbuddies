<?php

namespace Number\BuddyPattern;

use Number\Number;

class MultiplyThreeAndFive extends BuddyPattern
{

    /**
     * @param Number $number
     * @param int $indent
     * @return int
     */
    protected function calculateBuddy(Number $number, $indent)
    {
        return (int)($indent + ($indent * 3 * 5 * $number->getRoundedSquareRoot()) + 2);
    }
} 
