<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $table='news';

    public function categoryName(){
        return $this->hasOne(CategoryNews::class,'id','category_id');
    }
    public function userName(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
