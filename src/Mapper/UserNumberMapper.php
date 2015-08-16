<?php


namespace Mapper;


use Number\Number;

class UserNumberMapper extends DbMapper{


    public function create($buddyId, $userId)
    {
        $sql = "INSERT INTO user_number(user_id,buddy_id) VALUES( :userId,:buddyId)";

        $query = $this->getPdo()->prepare($sql);
        return $query->execute([':userId'=>$userId,':buddyId' =>$buddyId]);
    }
} 
