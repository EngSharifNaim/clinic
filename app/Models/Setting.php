<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Setting extends Model
{
    use  Translatable;
    protected $table='settings';
 
    public $translatedAttributes = ['name','description','keywords','address','about_us','our_vision','our_mision','goals','scedule'];

    public function setting_translations()
    {
        return $this->hasMany(SettingTranslation::class);
    }
    public function getLogoAttribute($icon)
    {
        if($icon) {
            return url('public/uploads/settings/' . $icon);
        }
        return '';
    }
    public function getImagebackAttribute($icon)
    {
        if($icon) {
            return url('public/uploads/settings/' . $icon);
        }
        return '';
    }
    public function getImagelogoAttribute($icon)
    {
        if($icon) {
            return url('public/uploads/settings/' . $icon);
        }
        return '';
    }

    public function getImageClientAttribute($icon)
    {
        if($icon) {
            return url('public/uploads/settings/' . $icon);
        }
        return '';
    }
}
