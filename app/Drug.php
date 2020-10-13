<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'drug_name',
        'drug_use'
    ];

    public function roshetas()
    {
        return $this->belongsToMany('App\Rosheta','drug_rosheta');
    }
}
