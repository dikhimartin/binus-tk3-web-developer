<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use DB;

class Sample extends Model
{
    Use Uuid;

    protected $table = 'samples';
    protected $fillable = [
        'name', 'description','status'
    ];
       
    public $incrementing = false;

    protected $keyType = 'uuid';
    
    // Query Builder version
    public function get_data(){
    	$data = DB::table('samples')
        ->select(
            'samples.id',
            'samples.name',
            'samples.description',
            'samples.status',
            'samples.created_at',
            'samples.updated_at'
        );
        return $data;
    }

}
