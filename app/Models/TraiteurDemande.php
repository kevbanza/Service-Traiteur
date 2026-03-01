<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TraiteurDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'temps',
        'nbre_personne',
        'detail', 
        'status'
    ];

    protected $appends = ['formatted_date'];



    
    public function getFormattedDateAttribute()
        {
            return  Carbon::parse($this->temps)->format('d/m/Y');
        }
}
