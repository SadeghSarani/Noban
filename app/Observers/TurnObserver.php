<?php

namespace App\Observers;

use App\Models\Turn;

class TurnObserver
{
    public function created(Turn $turn): void
    {
        $repository = app('doctorRepository');
        $doctor = $repository->getDoctor($turn->doctor_id);
        $reservationNumber = $doctor->reservation+1;
        $repository->addReservation($reservationNumber, $turn->doctor_id);
    }

    /**
     * Handle the Turn "updated" event.
     */
    public function updated(Turn $turn): void
    {
        //
    }

    /**
     * Handle the Turn "deleted" event.
     */
    public function deleted(Turn $turn): void
    {
        //
    }

    /**
     * Handle the Turn "restored" event.
     */
    public function restored(Turn $turn): void
    {
        //
    }

    /**
     * Handle the Turn "force deleted" event.
     */
    public function forceDeleted(Turn $turn): void
    {
        //
    }
}
