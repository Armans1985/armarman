<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proffesion extends Model
{
    use SoftDeletes;
    protected $fillable = [
         'name',
    ];
    public function member(){
        return $this->hasMany('App\Member');
    }
    protected $dates=['deleted_at'];
}
