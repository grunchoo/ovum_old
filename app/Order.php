<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'product_id', 'production_order_id', 'cantidad' , 'fecha_entrega', 'precio',  'status', 'observaciones', 'creator_id','creado_por'];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function detail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function productionOrder()
    {
        return $this->belongsTo(ProductionOrder::class);
    }
}
