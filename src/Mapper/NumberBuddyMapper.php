<?php

namespace Mapper;

use Number\Number;

class NumberBuddyMapper extends DbMapper
{

    /**
     * @param Number $number
     * @return bool
     */
    public function create(Number $number)
    {
        $sql = "INSERT INTO number_buddy(number_value,buddy_list) VALUES( :number,:buddies)";

        $statement = $this->getPdo()->prepare($sql);
        $bindParams = [
            ':number' => $number->getValue(),
            ':buddies' => json_encode($number->getBuddies())
        ];
        return $statement->execute($bindParams);

    }

    /**
     * @param Number $number
     * @return bool|mixed
     */
    public function readByNumber(Number $number)
    {
        $sql = "SELECT * FROM number_buddy WHERE number_value = ?";
        $query = $this->getPdo()->prepare($sql);
        $query->execute([$number->getValue()]);
        if ($query->rowCount() == 0) {
            return false;
        }
        return $query->fetch();
    }
} 
