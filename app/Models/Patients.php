<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Patients extends Model
{
    

    use HasFactory;

    protected $primaryKey = 'NumDoss';

    protected $fillable = [
        'NumDoss',
        'PrenomPat',
        'NomPat',
        'Sexe',
        'DateNaiss',
        'LieuNaiss',
        'Age',
        'Etat_civil',
        'AddressePat',
        'Mutuelle',
        'Profession',
        'Email',
        'Tel',
        'Observations', 
    ];


    // public function traitements(): BelongsToMany
    // {
    //     return $this->belongsToMany(Traitement::class);
    // }

    public function traitements()
    {
        return $this->belongsToMany(Traitement::class, 'patient_traitement', 'NumDoss', 'Num_Traitement');
    }
    


}
