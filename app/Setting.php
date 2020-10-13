<?php

namespace App;

use \Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;
    public $translatedAttributes = ['sitename', 'address', 'keywords', 'about_us', 'message_maintenace'];
    protected $fillable = [
      'logo', 'icon', 'email','phone_f', 'phone_l', 'facebook', 'youtube', 'twitter', 'google_plus', 'status'
    ];

    protected $appends = ['logo_path','icon_path'];


    public function getLogoPathAttribute() {

        return asset('uploads/' . $this->logo);
    }

    public function getIconPathAttribute() {

        return asset('uploads/' . $this->icon);
    }
}
