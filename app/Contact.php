<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contact_us';
    public $timestamps = true;

    protected $fillable =['readable'];

}
