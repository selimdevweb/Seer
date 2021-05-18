<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billetterie extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'quantite',
        'prix',
        'date',
        'heure_fin',
        'admin_id'
    ];

}
