<?php

namespace App\Exception;

use Hyperf\Server\Exception\ServerException;

class FlyException extends ServerException
{
    public function __construct($message = null, $code = 0, \Throwable $previous = null)
    {
        $message = $message ?? '服务器内部错误';
        parent::__construct($message, $code, $previous);
    }
}