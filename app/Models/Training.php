<?php

namespace App\Models;

use App\Models\TrainingCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function trainingCategory(){
        return $this->belongsTo(TrainingCategory::class, 'training_category_id', 'id');
    }

    public function trainingSubCategory(){
        return $this->belongsTo(TrainingSubCategory::class, 'training_subcategory_id');
    }

}
