<?php

namespace App\Services;

use App\Entity\User;
use App\Interfaces\AgeCalculatorInterface;
use DateTime;

/**
 * @author Benjamin Manguet
 */
class AgeCalculatorService implements AgeCalculatorInterface
{
    /**
     * @param User|null $user
     *
     * @return int|null
     */
    public function getAge(?User $user): ?int
    {
        $age = null;

        /**
         * @var User $user
         */
        if ($user && $user->getBirthdate()) {

            $today = new DateTime('now');
            $age   = $today->diff($user->getBirthdate())->y;
        }

        return $age;
    }
}