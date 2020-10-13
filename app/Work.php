<?php

namespace App;
use \Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['day'];


    public function employees()
    {
        return $this->belongsToMany('App\Employee','employee_work');
    }
}
