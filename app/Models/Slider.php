<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    protected $hidden = [  'created_at', 'updated_at', 'deleted_at', 'status'];

 
    public function getImageAttribute($icon)
    {
        if($icon) {
            return url('public/uploads/sliders/' . $icon);
        }
        return '';

    }
}
