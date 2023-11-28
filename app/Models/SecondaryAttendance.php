<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_age',
    ];

    public function attendance()
    {
        return $this->morphOne(Attendance::class, 'attendable');
    }
}
