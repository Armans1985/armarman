<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'url', 'poster', 'category_id',
    ];

    protected $casts = ['poster' => 'array'];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    protected $dates=['deleted_at'];
}
