<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'single_words','title','slug','des1','poem','des2','user_id','view_post','socail1','socail2','socail3','link1','link2','link3','status',
    ];

   
    public function categories(){
        return $this->belongsToMany(Category::class,'post_tag')->withPivot('category_id');
    }
     public function tag(){
            return $this->belongsToMany(Tag::class,'post_tag','tag_id','post_id');
     }

    
    
}
