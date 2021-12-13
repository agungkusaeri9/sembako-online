<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class,'bank_id','id');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class,'courier_id','id');
    }
}
