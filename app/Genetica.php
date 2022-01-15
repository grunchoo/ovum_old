<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genetica extends Model
{
    protected $fillable = [
        'sapid', 'propietario', 'nomgranja'
    ];

    public function pesoprom()    
    {
        return $this->hasMany(PesoPromedio::class);
    }

    public function crianza()    
    {
        return $this->belongsTo(Crianza::class);
    }
}
