<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoteStock extends Model
{
    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}
