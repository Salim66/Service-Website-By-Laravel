<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function subsubcategory(){
        return $this->belongsTo(SubSubCategory::class, 'subsubcategory_id');
    }

}
