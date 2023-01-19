<?php

namespace App\Constants;

class HttpStatusCode
{
    /** @var int */
    const OK                      = 200;

   /** @var int */
    const CREATED                 = 201;

    /** @var int */
    const BAD_REQUEST             = 400;

    /** @var int */
    const UNATHORIZED             = 401;

    /** @var int */
    const FORBIDDEN               = 403;

    /** @var int */
    const NOT_FOUND               = 404;

    /** @var int */
    const CONFLICT                = 409;

    /** @var int */
    const UNSUPPORTEED_MEDIA_TYPE = 415;

    /** @var int */
    const INVALID_PAYLOAD         = 422;

    /** @var int */
    const INTERNAL_SERVER_ERROR   = 500;

}