<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $fillable = [
        'user_id','attachment',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
