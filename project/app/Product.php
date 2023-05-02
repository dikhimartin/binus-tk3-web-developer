<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Product extends Model
{
    Use Uuid;

    protected $table = 'products';
    protected $fillable = [
        'product_type_id',
        'asset_id',
        'name',
        'description',
        'stock',
        'purchase_price',
        'selling_price',
        'status'
    ];
       
    public $incrementing = false;

    protected $keyType = 'uuid';
    
    // Query Builder version
    public function get_data(){
        $data = Product::select(
            'products.id',
            'products.product_type_id',
            'products.asset_id',
            'product_types.name as product_type_name',
            'products.name',
            'products.description',
            'products.stock',
            'products.purchase_price',
            'products.selling_price',
            'products.status',
            'assets.absolute_path as assets_absolute_path',
            'assets.relative_path as assets_relative_path',
            'assets.file_name as assets_name',
            'products.created_at',
            'products.updated_at') 
        ->leftjoin('assets', 'products.asset_id', '=', 'assets.id')
        ->leftjoin('product_types', 'products.product_type_id', '=', 'product_types.id');

        return $data;
    }
}
