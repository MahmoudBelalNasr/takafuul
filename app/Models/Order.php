<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    protected $fillable = [
        'city_id',
        'username',
        'identity_number',
        'birth_date',
        'phone1',
        'title',
        ];

    /*
     public function city(){
        return $this->hasOne(City::class, 'city_id', 'id');
    }
    */
}
