<?php

namespace App\Models;
 
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'status'];
    public $fillable = ['name_en','name_de','details_en','details_de','location_en','location_de'];

    public function getImageAttribute($icon)
    {
        if($icon) {
            return url('uploads/clients/' . $icon);
        }
        return '';
    }
   
}
