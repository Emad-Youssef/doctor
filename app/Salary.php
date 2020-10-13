<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{

    protected $table = 'salarys';
    public $timestamps = true;
    protected $fillable = [
        'salary'
      ];

    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id','id');
    }

}
