<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded=[];


    public function categoryName(){
        return $this->hasOne(CategoryGallery::class,'id','category_id');
    }
}
