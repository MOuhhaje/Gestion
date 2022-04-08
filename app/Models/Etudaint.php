<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudaint extends Model
{
    use HasFactory;
    protected $fillabel=['ID_Etudaint','Nom','Prenom','Adresse','Email','CIN','Apogee','F_ID','Niveau'];
    protected $guarded = [];
}
