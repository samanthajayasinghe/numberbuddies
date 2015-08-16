<?php

namespace Number\BuddyPattern;


use Number\Number;

abstract class BuddyPattern
{
    /**
     * @param Number $number
     * @param $indent
     * @return int
     * @throws Exception
     */
    public function getBuddy(Number $number, $indent)
    {
        $this->validateIndent($indent);
        return $this->calculateBuddy($number, $indent);
    }

    /**
     * @param Number $number
     * @param int $indent
     * @return int
     */
    protected abstract function calculateBuddy(Number $number, $indent);

    /**
     * @param $indent
     * @throws \Exception
     */
    protected function validateIndent($indent)
    {
        if ($indent < 1) {
            throw new \Exception("Invalid Indent");
        }
    }

} 
