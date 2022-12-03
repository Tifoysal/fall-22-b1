<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class,'category_id','id');
   }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
