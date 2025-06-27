<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'patient_id',
        'status',
        "alloted_time",
        "discharge_time",
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
