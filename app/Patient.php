<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patients';
    public $timestamps = true;

    public function pocket()
    {
        return $this->hasOne('App\Pocket','id','pocket_id');
    }

    public function rosheta()
    {
        return $this->hasMany('App\Rosheta');
    }

}
