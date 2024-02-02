<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonneMorale extends Model
{
    use HasFactory;
    protected $table = 'personnes_morales';

    protected $fillable = [
        'denomination',
        'forme_sociale',
        'siege_social',
        'num_rccm',
        'num_ifu',
        'nom_representant',
        'prenom_representant',
        'add_representant',
        'dom_representant',
        'home_representant',
        'nationalite',
        'piece_presentee',
        'tel_fixe',
        'tel_portable',
        'email',
    ];
}
