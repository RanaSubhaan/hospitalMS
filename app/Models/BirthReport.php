<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BirthReport extends Model
{
    protected $table = 'birthreports';
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'patient_id',
        'doctor_id',
        'description',
        'gender',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
