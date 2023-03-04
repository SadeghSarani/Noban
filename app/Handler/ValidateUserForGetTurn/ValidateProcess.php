<?php

namespace App\Handler\ValidateUserForGetTurn;

use App\Handler\ValidateUserForGetTurn\Handler\CheckCapacityDoctorHandler;
use App\Handler\ValidateUserForGetTurn\Handler\ValidateUserWithoutTurnDoctorHandler;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Facade;
class ValidateProcess extends Facade
{
    private static $classes = [
        ValidateUserWithoutTurnDoctorHandler::class,
        CheckCapacityDoctorHandler::class,
    ];

    public static function check($data)
    {
        AHandler::setData($data);
        try {
            collect(self::$classes)->each(function ($class){
                return app($class)->handle();
            });
        }catch (\Exception $exception){
            return response()->json([
                'error' => [
                    'title' => 'turn failed',
                    'description' => $exception->getMessage(),
                    'details' => 'user not given turn'
                ]
            ], $exception->getCode());
        }
    }
}
