<?php


namespace Service;

use Mapper\NumberBuddyMapper;
use Mapper\UserNumberMapper;
use Number\Number;
use \PDO;

class UserService
{

    public function saveBuddyNumber($value, $userId)
    {
        if (empty($userId) || (int)$userId <= 0) {
            throw new \Exception("Invalid User");
        }
        $number = new Number($value);
        $computeService = new BuddyComputeService();

        if (!$this->getNumberBuddyMapper()->readByNumber($number)) {
            $buddies = $computeService->generateBuddies($number);
            $number->setBuddies($buddies);
            $this->getNumberBuddyMapper()->create($number);
        }
        $savedNumber = $this->getNumberBuddyMapper()->readByNumber($number);
        return $this->getUserNumberMapper()->create($savedNumber['id'], $userId);

    }

    public function getBuddyNumbers($userId)
    {
        return $this->getUserNumberMapper()->readByUserId($userId);
    }

    public function deleteOldNumbers()
    {
        foreach ($this->getUserNumberMapper()->getUsers() as $user) {
            $this->getUserNumberMapper()->deleteByUserId($user['id'], 30);
        }
    }

    private function getPdo()
    {
        return new PDO(dsn, username, password);
    }

    private function getUserNumberMapper()
    {
        return new UserNumberMapper($this->getPdo());
    }

    private function getNumberBuddyMapper()
    {
        return new NumberBuddyMapper($this->getPdo());
    }


} 
