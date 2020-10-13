<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
}
