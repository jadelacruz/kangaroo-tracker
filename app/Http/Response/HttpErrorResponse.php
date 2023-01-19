<?php

namespace App\Http\Response;

use App\Http\Response\HttpResponseField;
use App\Constants\HttpStatusCode;

class HttpErrorResponse
{
    /**
     * @var HttpErrorResponse
     */
    private static HttpErrorResponse $instance;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var int
     */
    private int $code;

    /**
     * @param string                $message
     * @param int                   $status
     * 
     */
    protected function __construct(string $message, int $status = HttpStatusCode::BAD_REQUEST)
    {
        $this->message = $message;
        $this->code    = $status;
    }

    /**
     * @param string                $message
     * @param int                   $status
     * 
     * @return array<string, mixed>
     */
    public static function create(string $message, int $status = HttpStatusCode::BAD_REQUEST)
    {
        if (empty(self::$instance) === true) {
            self::$instance = new self($message, $status);
        }

        return self::$instance->createResponse();
    }

    /**
     * Create the Error response format
     * 
     * @return array<string, mixed>
     */
    private function createResponse()
    {
        return [
            HttpResponseField::FIELD_ERROR => [
                HttpResponseField::FIELD_MESSAGE => $this->message,
                HttpResponseField::FIELD_CODE    => $this->code
            ]
        ];
    }
}