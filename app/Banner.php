<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'main_title','title_2nd','title_3rd','title_4th','title_5th','imagename','slug','social1','social2','social3','social4','link1','link2','link3','link4','files','status',
    ];
}
