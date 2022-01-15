<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacunas extends Model
{
    protected $fillable = [
        'sapid', 'propietario', 'nomgranja'
    ];

    public function galpon()    
    {
        return $this->hasMany(Galpones::class);
    }

    public function crianza()    
    {
        return $this->hasMany(Crianza::class);
    }
}
