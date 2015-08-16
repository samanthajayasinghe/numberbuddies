<?php


namespace Mapper;


class UserNumberMapper extends DbMapper
{


    public function create($buddyId, $userId)
    {
        $sql = "INSERT INTO user_number(user_id,buddy_id) VALUES( :userId,:buddyId)";
        $query = $this->getPdo()->prepare($sql);
        return $query->execute([':userId' => $userId, ':buddyId' => $buddyId]);
    }

    public function readByUserId($userId)
    {
        $sql = "SELECT * FROM
                  user_number u,number_buddy n WHERE u.buddy_id = n.id AND u.user_id = ?";
        $query = $this->getPdo()->prepare($sql);
        $query->execute([$userId]);

        return $query->fetchAll();
    }

    public function deleteByUserId($userId, $days)
    {
        $sql = "DELETE FROM user_number WHERE user_id=? AND created_at >= DATE_SUB( CURDATE(), INTERVAL ? DAY )";

        $query = $this->getPdo()->prepare($sql);
        return $query->execute([$userId, $days]);
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM user";
        $query = $this->getPdo()->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function checkUserBuddy($userId, $number, $buddy)
    {
        $sql = "SELECT * FROM
                  user_number u,number_buddy n
                  WHERE u.buddy_id = n.id AND u.user_id = ? AND n.number_value= ? AND buddy_list RLIKE ?";
        $query = $this->getPdo()->prepare($sql);
        $query->execute([$userId, $number, $buddy]);
        return $query->rowCount();
    }
} 
