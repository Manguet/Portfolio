<?php

namespace App\Interfaces;

use App\Entity\User;

/**
 * @author Benjamin Manguet
 */
interface AgeCalculatorInterface
{
    /**
     * @param User|null $user
     *
     * @return int|null
     */
    public function getAge(?User $user): ?int;
}