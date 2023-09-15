<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pet() {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
