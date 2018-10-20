<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //
    public  function article(){
        return $this->hasMany(Classe::class, "a_id");

    }
    protected $fillable=["name","c_id"];
}
