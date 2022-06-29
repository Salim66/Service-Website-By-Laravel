<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;

class TrainingCategoryController extends Controller
{
    /**
     * Training Category view page
     */
    public function trainingCategoryView(){
        $categories = TrainingCategory::latest()->get();
        return view('backend.training-category.category_view', compact('categories'));
    }

    /**
     * Training Category store
     */
    public function trainingCategoryStore(Request $request){

        // Validation
        $request->validate([
            'training_category_name' => 'required'
        ],
        [
            'training_category_name.required' => 'The category name is required!'
        ]);

        TrainingCategory::create([
            'training_category_name' => $request->training_category_name,
            'training_category_slug' => strtolower(str_replace(' ', '-', $request->training_category_name))
        ]);

        $notification = [
            'message' => 'Training Category Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Training Category edit
     */
    public function trainingCategoryEdit($id){
        $data = TrainingCategory::findOrFail($id);
        return view('backend.training-category.category_edit', compact('data'));
    }

    /**
     * Training Category update
     */
    public function trainingCategoryUpdate(Request $request){

        $category_id = $request->id;

        TrainingCategory::findOrFail($category_id)->update([
            'training_category_name' => $request->training_category_name,
            'training_category_slug' => strtolower(str_replace(' ', '-', $request->training_category_name))
        ]);

        $notification = [
            'message' => 'Training Category Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.training.category')->with($notification);

    }

    /**
     * Training Category Delete
     */
    public function trainingCategoryDelete($id){

        TrainingCategory::findOrFail($id)->delete();

        $notification = [
            'message' => 'Training Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
