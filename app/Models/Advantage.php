<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    protected $table = 'adnvantages';
    protected $fillable = ['icon', 'text'];
}
