<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'path' , 'name', 'facebook_link', 'twitter_link', 'gplus_link', 'inkedin_link', 'profession_id'
    ];
    public function profes(){
        return $this->belongsTo('App\Proffesion','profession_id');
    }
    protected $dates=['deleted_at'];
}
