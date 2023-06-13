<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Userb extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom',
        'Prenom',
        'Ville',
        'Province',
        'CodePostal',
        'Adresse',
        'Telephone',
        'Courriel',
        'Langue',
        'EtatMatrimonial',
        'StatutCanada',
        'DateNaiss',
        'Pays',
        'Genre',
        'Menage',
        'Revenu',
        'Type_logement',
        'Q1',
        'Q2', 
        'Q3', 
        'Q4', 
        'Q5',
        'userl_id'
    ];


    public function fam(): HasMany
    {
        return $this->hasMany(Fam::class,'user_id');
    }

    public function userb(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasMany
    {
        return $this->hasMany(payment::class);
    }
}
