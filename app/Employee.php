<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employees';
    public $timestamps = true;

    public function salary()
    {
        return $this->hasOne('App\Salary');
    }

    public function works()
    {
        return $this->belongsToMany('App\Work', 'employee_work')->withPivot(['from','to']);
    }

}
