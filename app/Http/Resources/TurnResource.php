<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TurnResource extends JsonResource
{
    /**
     * @mixin \App\Models\Turn
     */
    public function toArray(Request $request): array
    {
        dd('engs');
      return [
            'doctor_id' => $request->doctor_id,
            'user_id' => $request->user_id,
            'turn_id' => $request->turn_id,
      ];
    }
}
