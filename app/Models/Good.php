<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good
 *
 * @property int $id
 * @property string $name
 * @property int $g_id
 * @property float $price
 * @property string $intro
 * @property int $is_on_sale
 * @property int $number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereGId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereIsOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Good extends Model
{
    //
    protected $fillable=["name","g_id","price","intro","is_on_sale","number","logo"];
    public  function category(){
        return $this->belongsTo(Category::class, "g_id");

    }

}
