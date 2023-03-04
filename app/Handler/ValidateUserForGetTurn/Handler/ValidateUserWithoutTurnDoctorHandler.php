<?php

namespace App\Handler\ValidateUserForGetTurn\Handler;
use App\Exceptions\UserHasTurnException;
use App\Handler\ValidateUserForGetTurn\AHandler;
use App\Repository\TurnRepository;

class ValidateUserWithoutTurnDoctorHandler extends AHandler
{

    public function handle()
    {
        $data = AHandler::getData();
        $turn = app(TurnRepository::class)->getTurnUser($data['user_id'], $data['doctor_id']);

        if (!$turn->isEmpty()){
            throw new UserHasTurnException();
        }

    }
}
