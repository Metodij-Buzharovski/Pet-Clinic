<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'pet_id');
    }
}
