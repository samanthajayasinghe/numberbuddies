<?php


namespace Service;

use Mapper\NumberBuddyMapper;
use Mapper\UserNumberMapper;
use Number\Number;
use \PDO;

class UserService
{

    /**
     * @param $value
     * @param $userId
     * @return bool
     * @throws \Exception
     */
    public function saveBuddyNumber($value, $userId)
    {

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

    /**
     * @param $userId
     * @return array
     */
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

    /**
     * @param $userId
     * @param $number
     * @param $buddy
     * @return bool
     */
    public function checkUserBuddy($userId, $number, $buddy)
    {
        if (empty($number) || empty($buddy)) {
            throw new \Exception("Invalid Number or Buddy");
        }
        $result = $this->getUserNumberMapper()->checkUserBuddy($userId, $number, $buddy);
        if($result == 0){
            return false;
        }
        return true;
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
