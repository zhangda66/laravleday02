<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    protected $fillable=["name","g_id","price","intro","is_on_sale","number"];
    public  function category(){
        return $this->belongsTo(Category::class, "g_id");

    }

}
