<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public function images()
    {
        return $this->hasMany(AboutImage::class,'about_id','id');

    }
}
