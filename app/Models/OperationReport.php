<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperationReport extends Model
{
    protected $table = 'operationreports';
    use HasFactory,SoftDeletes;
    protected $fillable=[
        "patient_id",
        "description",
        "doctor_id",
        "status",
    ];

    public function patient()
    {
        return $this->belongsTo(patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
