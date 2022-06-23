<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Post Category view page
     */
    public function postCategoryView(){
        $categories = PostCategory::latest()->get();
        return view('backend.post-category.category_view', compact('categories'));
    }

    /**
     * Post Category store
     */
    public function postCategoryStore(Request $request){

        // Validation
        $request->validate([
            'post_category_name' => 'required'
        ],
        [
            'post_category_name.required' => 'The category name is required!'
        ]);

        PostCategory::create([
            'post_category_name' => $request->post_category_name,
            'post_category_slug' => strtolower(str_replace(' ', '-', $request->post_category_name))
        ]);

        $notification = [
            'message' => 'Post Category Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Post Category edit
     */
    public function postCategoryEdit($id){
        $data = PostCategory::findOrFail($id);
        return view('backend.post-category.category_edit', compact('data'));
    }

    /**
     * Post Category update
     */
    public function postCategoryUpdate(Request $request){

        $category_id = $request->id;

        PostCategory::findOrFail($category_id)->update([
            'post_category_name' => $request->post_category_name,
            'post_category_slug' => strtolower(str_replace(' ', '-', $request->post_category_name))
        ]);

        $notification = [
            'message' => 'Post Category Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.post.category')->with($notification);

    }

    /**
     * Post Category Delete
     */
    public function postCategoryDelete($id){

        PostCategory::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
