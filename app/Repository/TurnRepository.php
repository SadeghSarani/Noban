<?php

namespace App\Repository;

use App\Models\Turn;

class TurnRepository
{
    const ACTIVE_STATUS = 'Active';
    private mixed $model;

    public function __construct()
    {
        $this->model = app(Turn::class);
    }

    public function getTurnUser($userId, $doctorId)
    {

        return $this->model::query()
             ->where('user_id', $userId)
             ->where('doctor_id', $doctorId)
             ->where('status', self::ACTIVE_STATUS)
             ->get();
    }

    public function create($data)
    {
       return $this->model::create($data);
    }
}
