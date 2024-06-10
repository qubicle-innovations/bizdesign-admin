<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expertise extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function section1()
    {
        return $this->hasMany(Expertise_Firstsection::class);
    }
    public function section2()
    {
        return $this->hasMany(Expertise_Secondsection::class);
    }
}
