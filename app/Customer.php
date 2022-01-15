<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'cuit', 'cod_cliente', 'codpost', 'localidad', 'provincia', 'avatar', 'telefono', 'email', 'observaciones'];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(CustomerWarehouse::class);
    }
}
