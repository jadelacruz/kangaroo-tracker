<?php

namespace App\Http\Response;

use App\Constants\HttpStatusCode;

class HttpResponse
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
     * @param string $sMessage,
     * @param int    $sStatus
     * 
     * @return array<string, mixed>
     */
    public static function create(string $sMessage, int $sStatus = HttpStatusCode::OK)
    {
        return [
            self::FIELD_MESSAGE => $sMessage,
            self::FIELD_CODE    => $sStatus
        ];
    }

    /**
     * @param string $sMessage
     * @param int    $sStatus
     * 
     * @return array<string, mixed>
     */
    public static function createError(string $sMessage, int $sStatus = HttpStatusCode::BAD_REQUEST)
    {
        return [
            self::FIELD_ERROR => [
                self::FIELD_MESSAGE => $sMessage,
                self::FIELD_CODE    => $sStatus
            ]
        ];
    }
}