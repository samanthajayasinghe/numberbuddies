<?php

namespace Number\BuddyPattern;

use Number\Number;

class MultiplyThree extends BuddyPattern
{
    /**
     * @param Number $number
     * @param int $indent
     * @return int
     */
    protected function calculateBuddy(Number $number, $indent)
    {
        return $indent + ($indent * $number->getValue());
    }
}
