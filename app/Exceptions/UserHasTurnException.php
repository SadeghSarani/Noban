<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UserHasTurnException extends \Exception
{
    public function __construct(
        int $code = Response::HTTP_UNPROCESSABLE_ENTITY,
        string $message = 'user have turn in-progress for this doctor',
        ?Throwable $previous = null)
    {
        $this->message = $message;
        parent::__construct($message, $code, $previous);
    }
}
