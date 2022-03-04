<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model implements Authenticatable
{
    use BasicAuthenticatable;  
    protected $fillable = [
        'email',
        'password',
    ];
    
}
