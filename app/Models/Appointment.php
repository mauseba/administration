<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'horeIn',
        'horeFn',
        'date',
        'user_id'
    ];


    public function userb(): BelongsTo
    {
        return $this->belongsTo(Userb::class);
    }
}
