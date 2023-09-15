<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $temp = User::all()->where('name', '=', request('search'))->toArray();
            if($temp!=null){
                $ownerName=array_pop($temp)['id'];
                $query->where('user_id', 'like', '%' . $ownerName . '%');
            }
            else{
                $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('breed', 'like', '%' . request('search') . '%');
            }
        }
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'pet_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'pet_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
