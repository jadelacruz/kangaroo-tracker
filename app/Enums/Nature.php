<?php

namespace App\Enums;

enum Nature: int
{
    case FRIENDLY     = 1;
    case NOT_FRIENDLY = 0;

    /**
     * @return bool
     */
    public function isFriendly(): bool
    {
        return $this === Nature::FRIENDLY;
    }

    /**
     * @return bool
     */
    public function isNotFriendly(): bool
    {
        return $this === Nature::NOT_FRIENDLY;
    }
}