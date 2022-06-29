<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trainingCategory(){
        return $this->belongsTo(TrainingCategory::class, 'training_category_id');
    }

}
