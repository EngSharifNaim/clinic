<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'status'];
    protected $fillable = ['name_de','name_en','details_en','destails_de','short_details_en','short_details_de','image','status'];

  
    public function getImageAttribute($icon)
    {
        if($icon) {
            return url('uploads/services/' . $icon);
        }
        return '';
    }
   
}
