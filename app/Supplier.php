<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name'];
    //
    public function loteprod()
    {
        return $this->belongsTo(loteprod::class);
    }
    public function sw()
    {
        return $this->hasMany(SupplierWarehouse::class);
    }
}
