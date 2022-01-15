<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrderDetail extends Model
{
    protected $fillable = ['lote_id', 'production_order_id', 'huevosinc', 'hembra', 'macho' , 'segunda', 'total' , 'nacperc', 'bbent1', 'bbent2', 'bbsacrificado'];

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

    public function loteStock()
    {
        return $this->belongsTo(LoteStock::class);
    }

    public function productionOrder()
    {
        return $this->belongsTo(ProductionOrder::class);
    }
}
