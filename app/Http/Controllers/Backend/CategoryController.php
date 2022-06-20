<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Category view page
     */
    public function categoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    /**
     * Category store
     */
    public function categoryStore(Request $request){

        // Validation
        $request->validate([
            'category_name' => 'required'
        ],
        [
            'category_name.required' => 'The category name is required!'
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);

        $notification = [
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Category edit
     */
    public function categoryEdit($id){
        $data = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('data'));
    }

    /**
     * Category update
     */
    public function categoryUpdate(Request $request){

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);

        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.category')->with($notification);

    }

    /**
     * Category Delete
     */
    public function categoryDelete($id){

        Category::findOrFail($id)->delete();

        $notification = [
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

}
