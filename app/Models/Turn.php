<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;

    protected $fillable = [
      'doctor_id', 'user_id', 'expired_at'
    ];

    public function doctor()
    {
       return $this->belongsTo(Doctor::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
