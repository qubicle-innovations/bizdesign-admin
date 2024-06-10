<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business_Category extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function section1()
    {
        return $this->hasMany(Business_Firstsection::class,'business_id');
    }
    public function section2()
    {
        return $this->hasMany(Business_Secondsection::class,'business_id');
    }
}
