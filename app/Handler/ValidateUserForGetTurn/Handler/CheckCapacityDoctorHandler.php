<?php
namespace App\Handler\ValidateUserForGetTurn\Handler;

use App\Exceptions\DoctorCapacityException;
use App\Handler\ValidateUserForGetTurn\AHandler;

class CheckCapacityDoctorHandler extends AHandler
{
    public function handle()
    {
        $data = AHandler::getData();
        $doctor= app('doctorRepository')->getDoctor($data['doctor_id']);

        if ($doctor->reservation >= $doctor->capacity){
            throw new DoctorCapacityException();
        }
    }
}
