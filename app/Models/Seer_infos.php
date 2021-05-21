<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seer_infos extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'adresse',
    ];
}
