<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'payment_id',
        'amount',
        'statup',
        'date',
        'groupe',
        'hourap',
        'userb_id'    
    ];

    public function userb(): BelongsTo
    {
        return $this->belongsTo(Userb::class);
    }  
    
}
