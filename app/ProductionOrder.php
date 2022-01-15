<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrder extends Model
{
    protected $fillable = ['lote_id', 'status', 'observaciones','dateofend', 'user_id', 'incubado_por', 'incubado_at' ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }

    public function prodordet()
    {
        return $this->belongsTo(ProductionOrderDetail::class);
    }
}
