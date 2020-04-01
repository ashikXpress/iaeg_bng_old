<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded=[];


    public function categoryName(){
        return $this->hasOne(EventCategory::class,'id','event_category_id');

    }

    public function images()
    {
        return $this->hasMany(EventImage::class,'event_id','id');

    }

    public function members() {
        return $this->belongsToMany(Member::class)->withPivot('date','payment_method','exhibition_category');
    }
}
