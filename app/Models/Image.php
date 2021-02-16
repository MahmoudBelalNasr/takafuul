<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'user_id','image',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
