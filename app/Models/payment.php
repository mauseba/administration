<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class payment extends Model
{
    /*protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::random(10); // Genera una cadena aleatoria de 10 caracteres para el ID
        });
    }*/

    public function userb(): BelongsToMany
    {
        return $this->belongsToMany(Userb::class);
    }


    
    
    use HasFactory;
}
