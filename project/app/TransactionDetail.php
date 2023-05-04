<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class TransactionDetail extends Model
{
    Use Uuid;

    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'price',
        'sub_price'
    ];

    public $incrementing = false;

    protected $keyType = 'uuid';
}