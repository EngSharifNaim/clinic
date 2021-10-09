<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $hidden = [  'created_at', 'updated_at', 'deleted_at', 'status'];
    protected $fillable = ['name_de','name_en','decription_en','description_de','image','status'];
    
   
    public function getImageAttribute($icon)
    {
        if($icon) {
            return url('public/uploads/doctors/' . $icon);
        }
        return '';
    }
}







