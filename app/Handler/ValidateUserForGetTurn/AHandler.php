<?php

namespace App\Handler\ValidateUserForGetTurn;

abstract class AHandler
{
    private static $data;

    abstract function handle();

    public static function setData($data)
    {
        return self::$data = $data;
    }

    public static function getData()
    {
        return self::$data;
    }
}
