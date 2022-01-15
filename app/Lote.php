<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    public function productionOrderDetail()
    {
        return $this->belongsTo(ProductionOrderDetail::class);
    }

    public function loteStock()
    {
        return $this->hasMany(LoteStock::class);
    }
}
