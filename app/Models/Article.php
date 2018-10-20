<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public  function classe(){
        return $this->belongsTo(Classe::class, "a_id");

    }
    protected $fillable=["title","content","author","a_id"];
}
