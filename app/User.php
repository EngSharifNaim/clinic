<?php

namespace App;

use App\Models\Order;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use SoftDeletes,Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'image', 'name',  'mobile' ,'email', 'password', 'status','city','country'
    ];


    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'
    ];
    ///////////////////////////////////////////////////////////////////////////
    public function favourites()
    {
        return $this->belongsToMany(Work::class,'favourites');
    }
    //////////////////////////////////////////////////////////////////////////
    public function getAvatarAttribute($value)
    {
        if ($value) {
            return url('uploads/users/' . $value);
        }
        else{
            return "";
        }
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}