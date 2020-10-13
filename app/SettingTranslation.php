<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['sitename', 'address', 'keywords','about_us', 'message_maintenace'];
}
