<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'payment_id',
        'amount',
        'statup',
        'qr_url'    
    ];

    public function userb(): BelongsToMany
    {
        return $this->belongsToMany(Userb::class);
    }  
    
}
