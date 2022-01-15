<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galpones extends Model
{
    protected $fillable = [
        'sapid', 'propietario', 'nomgranja'
    ];

    public function granja()    
    {
        return $this->belongsTo(Granja::class);
    }

    public function crianza()    
    {
        return $this->hasMany(Crianza::class);
    }

    public function lotes()    
    {
        return $this->hasMany(Lotes::class);
    }

    public function cactiva()    
    {
        return $this->belongsTo('App\Crianza', 'galpon_id')->where('estado', "Activa");
    }
}
