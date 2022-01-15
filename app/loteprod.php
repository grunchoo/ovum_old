<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loteprod extends Model
{
    protected $dates = ['created_at', 'updated_at', 'fecha_nacimiento'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function supplier()
    {
        return $this->belongsTo(SupplierWarehouse::class);
    }
    public function postura()
    {
        return $this->belongsTo(postura::class);
    }
    

}
