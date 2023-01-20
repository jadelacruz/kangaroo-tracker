<?php

namespace App\Http;;

use App\Constants\HttpStatusCode;
use JsonSerializable;

class Response implements JsonSerializable
{
     /**
     * @var string
     */
    const FIELD_MESSAGE = 'message';

    /**
     * @var string
     */
    const FIELD_ERROR   = 'error';

    /**
     * @var string
     */
    const FIELD_CODE    = 'code';

    /**
     * @var string
     */
    const FIELD_DETAILS = 'details';

    /**
     * @param string $sMessage
     * @param int    $sStatusCode
     */
    public function __construct(
        private string $sMessage,
        private int $sStatusCode = HttpStatusCode::OK,
    ) { 

    }

    /**
     * @return mixed|array|bool
     */
    public function jsonSerialize(): mixed
    {
        if ( $this->sStatusCode < HttpStatusCode::BAD_REQUEST ) {
            return [
                self::FIELD_MESSAGE => $this->sMessage,
                self::FIELD_CODE    => $this->sStatusCode
            ];
        } 

        return [
            self::FIELD_ERROR => [
                self::FIELD_MESSAGE => $this->sMessage,
                self::FIELD_CODE    => $this->sStatusCode
            ]
        ];
    }

    /**
     * @param string $sMessage
     * @param int    $iStatusCode
     * 
     * @return Response|self
     */
    public static function create(string $sMessage, int $iStatusCode = HttpStatusCode::OK): Response
    {
        return new self($sMessage, $iStatusCode);
    }
}