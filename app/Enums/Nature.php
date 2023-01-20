<?php

namespace App\Enums;

enum Nature: string
{
    case FRIENDLY      = 'f';
    case NOT_FRIENDLY  = 'nf';

    /** @var string */
    const EMPTY_VALUE  = 'N/A';
   
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

    /**
     * @return string
     */
    public function castToWord(): string
    {
        return $this === Nature::FRIENDLY ? 'Friendly': 'Not Friendly';
    }
}