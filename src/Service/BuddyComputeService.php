<?php

namespace Service;


use Number\BuddyPattern\MultiplyFive;
use Number\BuddyPattern\MultiplyThree;
use Number\BuddyPattern\MultiplyThreeAndFive;
use Number\Number;

class BuddyComputeService
{
    /**
     * @var MultiplyThree
     */
    private $multiplyThreeByddy = null;

    /**
     * @var MultiplyFive
     */
    private $multiplyFiveByddy = null;

    /**
     * @var MultiplyThreeAndFive
     */
    private $multiplyThreeAndFiveByddy = null;

    public function __construct()
    {
        $this->multiplyThreeByddy = new MultiplyThree();
        $this->multiplyFiveByddy = new MultiplyFive();
        $this->multiplyThreeAndFiveByddy = new MultiplyThreeAndFive();
    }

    /**
     * @param Number $number
     * @return array
     */
    public function generateBuddies(Number $number)
    {
        $buddies = [];

        for ($i = 1; $i <= $number->getValue(); $i++) {

            if (count($buddies) >= $number->getValue()) {
                return;
            }

            $modThree = $i % 3;
            $modFive = $i % 5;
            if ($modThree != 0 && $modFive != 0) {
                continue;
            }

            if ($modThree == 0) {
                $buddies[] = $this->multiplyThreeByddy->getBuddy($number, $i);
            }

            if ($modFive == 0) {
                $buddies[] = $this->multiplyFiveByddy->getBuddy($number, $i);
            }

            if ($modThree == 0 && $modFive == 0) {
                $buddies[] = $this->multiplyThreeAndFiveByddy->getBuddy($number, $i);
            }

        }

        return $buddies;
    }

} 
