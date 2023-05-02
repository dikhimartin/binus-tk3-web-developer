<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class ProductType extends Model
{
    Use Uuid;

    protected $table = 'product_types';
    protected $fillable = [
        'name', 'description','status'
    ];
       
    public $incrementing = false;

    protected $keyType = 'uuid';
    
    // Query Builder version
    public function get_data(){
    	$data = DB::table('product_types')
        ->select(
            'product_types.id',
            'product_types.name',
            'product_types.description',
            'product_types.status',
            'product_types.created_at',
            'product_types.updated_at'
        );
        return $data;
    }
}
