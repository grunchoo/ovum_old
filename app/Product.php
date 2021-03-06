<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = ['name', 'detail'];

public function order()
{
    return $this->belongsTo(Order::class);
}

public function orderDetail()
{
    return $this->belongsTo(OrderDetail::class);
}
}