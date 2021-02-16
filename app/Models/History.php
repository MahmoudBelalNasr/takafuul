<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'users_history';
    protected $fillable = [
        'user_id',
        'login_at',
        'logout_at',
    ];

    //To make virtual column
    protected $appends =['stay_time'];
    public function getStayTimeAttribute(){
        if (!empty($this->login_at) && !empty($this->logout_at)) {
            return Carbon::parse($this->login_at)->diffInMinutes(Carbon::parse($this->logout_at)) ;
        }else{
            $msg  ="أونلاين";
            return $msg;
        }
    }
    public function users(){
        return $this->hasMany(User::class, 'user_id');
    }
}
