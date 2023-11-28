<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryAttendance extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'patient_age',
    ];

    public function attendance()
    {
        return $this->morphOne(Attendance::class, 'attendable');
    }
}
