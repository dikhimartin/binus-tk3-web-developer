<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Transaction extends Model
{
    Use Uuid;

    protected $table = 'transactions';
    protected $fillable = [
        'customer_id',
        'staff_id',
        'transaction_date',
        'description',
        'status_transaction',
        'creator_id',
        'modifier_id'
    ];

    public $incrementing = false;

    protected $keyType = 'uuid';


    // Before Create Hook
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->id = (string) Str::uuid(); // generate uuid
                // Change id with your primary key
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
            if (empty($model->status_transaction)) {
                $model->status_transaction = "pending"; 
            }
            if (empty($model->transaction_date)) {
                $model->transaction_date = now(); 
            }
            if (empty($model->customer_id)) {
                $model->customer_id = Auth::id(); 
            }
            if (empty($model->creator_id)) {
                $model->creator_id = Auth::id(); 
            }
            if (empty($model->modifier_id)) {
                $model->modifier_id = Auth::id(); 
            }
        });
    }
}

