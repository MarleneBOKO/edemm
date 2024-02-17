<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMoraleOperation extends Model
{
    use HasFactory;
    public function personneMorale()
    {
        return $this->belongsTo(PersonneMorale::class);
    }
}
