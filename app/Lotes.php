<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lotes extends Model
{
    protected $fillable = [
        'saplote', 'granja_id', 'closed_at'
    ];

    public function galpon()    
    {
        return $this->hasMany(Galpones::class);
    }

    public function crianza()    
    {
        return $this->hasMany(Crianza::class);
    }

    public function granja()    
    {
        return $this->belongsTo(Granja::class);
    }

}
