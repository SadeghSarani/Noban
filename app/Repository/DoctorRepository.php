<?php

namespace App\Repository;

use App\Models\Doctor;

class DoctorRepository
{
    private Doctor $model;

    public function __construct()
    {
        $this->model = app(Doctor::class);
    }

    public function addReservation($reservation, $doctorId)
    {
       return tap($this->model::query()
           ->where('id', $doctorId)
           ->update([
            'reservation' => $reservation
       ]));
    }

    public function getDoctor($doctorId)
    {

       return $this->model::query()
            ->where('id', $doctorId)
            ->first();
    }
}
