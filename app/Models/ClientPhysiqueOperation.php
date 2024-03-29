<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPhysiqueOperation extends Model
{
    use HasFactory;
    public function personnePhysique()
    {
        return $this->belongsTo(PersonnePhysique::class);
    }
}
