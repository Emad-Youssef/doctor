<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pocket extends Model
{

    protected $table = 'pockets';
    public $timestamps = true;
    protected $fillable = [
        'f_name', 'l_name', 'country', 'city', 'sex', 'phone', 'age', 'y', 'm', 'd', 'patient', 'confirm',
    ];
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

}
