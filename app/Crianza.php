<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crianza extends Model
{
    protected $fillable = [
        'sapid', 'propietario', 'nomgranja'
    ];

    public function galpones()    
    {
        return $this->belongsTo(Galpones::class);
    }

    public function granjas()    
    {
        return $this->belongsTo(Granjas::class);
    }

    public function genetica()    
    {
        return $this->belongsTo(Genetica::class);
    }

    public function lotes()    
    {
        return $this->belongsTo(Lotes::class);
    }

    public function mortandades()    
    {
        return $this->hasMany(Mortandades::class);
    }

    public function pesos()    
    {
        return $this->hasMany(Pesos::class);
    }
}
