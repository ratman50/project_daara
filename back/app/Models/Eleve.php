<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $fillable=[
        "numero",
        "prenom",
        "nom",
        "date_naiss",
        "lieu_naiss",
        "type",
        "sexe"
    ];
}
