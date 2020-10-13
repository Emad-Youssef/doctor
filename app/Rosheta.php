<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rosheta extends Model
{

    protected $table = 'roshetas';
    public $timestamps = true;

    public function patient()
    {
        // return $this->hasOne('App\Patient');
        return $this->belongsTo('App\Patient','patient_id','id');
    }

    public function drugs()
    {
        return $this->belongsToMany('App\Drug', 'drug_rosheta');
    }


}
