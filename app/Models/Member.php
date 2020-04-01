<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $guard = 'member';

    protected $guarded=[];

    public function events() {
        return $this->belongsToMany(Event::class)->withPivot('date','payment_method','exhibition_category');
    }

    public function memberType()
    {
        return $this->hasOne(MemberType::class,'id','member_type_id');
    }


}
