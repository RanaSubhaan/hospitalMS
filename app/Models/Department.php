<?php

namespace App\Models;

use App\Http\Livewire\Admins\Blocks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo_path',
        'block_id',
        'hod_id',
    ];

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }

    /**
     * Get the block that owns the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

    /**
     * Get the hod associated with the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hod(): BelongsTo
    {
        return $this->BelongsTo(Hod::class,'hod_id','id');
    }

}
