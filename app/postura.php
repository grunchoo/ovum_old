<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postura extends Model
{
    protected $fillable = ['loteprod_id', 'mort_h', 'mort_m', 'incub', 'comlimp', 'sucio', 'rotos', 'tirados', 'total', 'observaciones', 'user_id', 'semana', 'dia'];
    //
    public function loteprod()
    {
        return $this->belongsTo(loteprod::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function supplier()
    {
        return $this->belongsTo(SupplierWarehouse::class);
    }
    
}
