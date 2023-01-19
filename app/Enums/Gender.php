<?php

namespace App\Enums;

enum Gender: string
{
    case MALE = 'm';
    case FEMALE = 'f';

    /**
     * @return bool
     */
    public function isMale(): bool
    {
        return $this === Gender::MALE;
    }

    /**
     * @return bool
     */
    public function isFemale(): bool
    {
        return $this === Gender::FEMALE;
    }
}