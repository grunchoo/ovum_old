<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierWarehouse extends Model
{
    //
    public function loteprod()
    {
        return $this->belongsTo(loteprod::class);
    }

     public function postura()
    {
        return $this->belongsTo(postura::class);
    }
}
