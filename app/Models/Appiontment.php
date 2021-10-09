<?php

namespace App\Models; 

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appiontment extends Model
{
    use SoftDeletes;
    protected $table = 'appiontments';

    protected $fillable = [
       'name','mobile','age','gender','email','resone'
    ];
}
