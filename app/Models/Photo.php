<?php

namespace App\Models;

use Dimsav\Translatable\Translatable; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;
    protected $hidden = [  'created_at', 'updated_at', 'deleted_at', 'status'];
    public $fillable = ['image'];
    
    public function getImageAttribute($icon)
    {
        if($icon) {
            return url('uploads/photos/' . $icon);
        }
        return '';

    }
}
