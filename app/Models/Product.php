<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function image()
    {
        return asset('storage/' . $this->image);
    }

    public function best()
    {
        return $this->hasMany(TransactionDetail::class,'product_id','id');
    }

}
