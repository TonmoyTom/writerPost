<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','status','category_id','post_id'
    ];



    public function post() {

        return $this->belongsToMany(Post::class,'post_tag')->withPivot('post_id');

    }

}
