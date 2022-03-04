<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableau_enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_enseignant',
        'nom_ue',
        'credit',
        'ct',
        'td',
        'tp',
        'tpe',
        'gpe',
        'mp',
        'me',
    ];
}
