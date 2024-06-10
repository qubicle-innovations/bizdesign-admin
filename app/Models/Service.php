<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function section1()
    {
        return $this->hasMany(ServiceFirstSection::class,'service_id');
    }
    public function section2()
    {
        return $this->hasMany(ServiceSecondSection::class,'service_id');
    }
}
