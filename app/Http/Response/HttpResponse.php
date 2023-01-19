<?php

namespace App\Http\Response;

use App\Http\Response\HttpResponseField;
use App\Constants\HttpStatusCode;

class HttpResponse
{
    /**
     * @var HttpResponse
     */
    private static HttpResponse $instance;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var int
     */
    private int $status;

    /**
     * @param string $message;
     * @param int    $status
     * 
     */
    private function __construct(string $message, int $status = HttpStatusCode::OK)
    {
        $this->message = $message;
        $this->status  = $status;
    }

    /**
     * @param string $message,
     * @param int    $status
     * 
     * @return array<string, mixed>
     */
    public static function create(string $message, int $status = HttpStatusCode::OK)
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
            HttpResponseField::FIELD_MESSAGE => $this->message,
            HttpResponseField::FIELD_CODE    => $this->status
        ];
    }
}