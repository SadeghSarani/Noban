<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DoctorCapacityException extends Exception
{
    public function __construct(
        string $message = "capacity_doctor_is_full",
        int $code = Response::HTTP_UNPROCESSABLE_ENTITY,
        ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
