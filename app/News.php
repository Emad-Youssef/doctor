<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $table = 'news';
    public $timestamps = true;

    public $translatedAttributes = ['title','description'];
    protected $fillable = ['img','status','on_slider'];
}
