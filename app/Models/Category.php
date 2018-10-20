<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public  function goods(){
        return $this->hasMany(Good::class, "g_id");

    }
    protected $fillable=["name","c_id"];
}
