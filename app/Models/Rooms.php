<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'department_id',
        'type',
        'status'
];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function beds()
    {
        return $this->hasMany(Beds::class);
    }
}
