<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fam extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomCom',
        'LienP',
        'Sex',
        'Age',
        'user_id'
    ];


    public function userb(): BelongsTo
    {
        return $this->belongsTo(Userb::class);
    }
}
