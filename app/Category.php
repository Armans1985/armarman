<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'];
    public function project(){
        return $this->hasMany('App\Project');
    }
    protected $dates=['deleted_at'];
}
