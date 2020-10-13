<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = ['number','img'];
}
