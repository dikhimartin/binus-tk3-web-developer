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
            if (empty($model->creator_id)) {
                $model->creator_id = Auth::id(); 
            }
            if (empty($model->modifier_id)) {
                $model->modifier_id = Auth::id(); 
            }
        });
    }

    // Query Builder version
    public function get_data(){
        $data = Transaction::select(
            'transactions.id',
            'transactions.customer_id',
            'transactions.staff_id',
            'creator.name as creator_name',
            'roles.display_name as roles',
            'user_customer.name as customer_name',
            'user_staff.name as staff_name',
            'transactions.transaction_date',
            'transactions.description',
            'transactions.status_transaction',
            'transactions.created_at',
            'transactions.updated_at')
        ->leftjoin('customers', 'transactions.customer_id', '=', 'customers.id')
        ->leftjoin('staff', 'transactions.staff_id', '=', 'staff.id')
        ->leftjoin('users as user_customer', 'customers.user_id', '=', 'user_customer.id')
        ->leftjoin('users as user_staff', 'staff.user_id', '=', 'user_staff.id')
        ->leftjoin('users as creator', 'transactions.creator_id', '=', 'creator.id')
        ->leftjoin('role_user', 'creator.id', '=', 'role_user.user_id')
        ->leftjoin('roles', 'role_user.role_id', '=', 'roles.id');
        return $data;
    }
}

