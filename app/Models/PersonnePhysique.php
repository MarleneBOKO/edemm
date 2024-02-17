<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnePhysique extends Model
{
    use HasFactory;
    protected $table = 'personnes_physiques';
    protected $fillable = [
        'name',
        'date_lieu',
        'nation',
        'adres_pro',
        'adres_ref',
        'tel',
        'np',
        'ident',
        'prenom',
        'sit_mat',
        'profession',
        'adres_dom',
        'tel_fixe',
        'piece_presente',
        'date_lieu_piece',

    ];
    public function operationsPhysiques()
    {
        return $this->hasMany(ClientPhysiqueOperation::class);
    }
}

