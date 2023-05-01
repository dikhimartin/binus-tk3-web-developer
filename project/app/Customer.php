<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Customer extends Model
{

    use  Uuid;

    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'national_identity_asset_id',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'province_id',
        'city_id',
        'subdistrict_id',
        'address_line',
        'status',
        'creator_id',
        'modifier_id',
        'sort',
        'additional'
    ];
       
    public $incrementing = false;

    protected $keyType = 'uuid';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function nationalIdentityAsset(){
        return $this->belongsTo(Asset::class, 'national_identity_asset_id');
    }

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function subdistrict() {
        return $this->belongsTo(Subdistrict::class);
    }
}
