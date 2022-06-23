<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
    * Post view
    */
    public function postManage(){
        $posts = Post::latest()->get();
        return view('backend.post.view_post', compact('posts'));
    }

    /*
    * Add Post
    */
    public function addPost(){
        $categories = PostCategory::all();
        return view('backend.post.add_post', compact('categories'));
    }

    /**
    * Store Post
    */
    public function postStore(Request $request){

        // Validation
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'image' => 'required',
        ]);

        // Post Image
        $save_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 480)->save('upload/post/'. $name_gen);
            $save_url = 'upload/post/'.$name_gen;
        }

        //store post
        Post::create([
            'user_id' => Auth::guard('admin')->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
            'image' => $save_url,
            'description' => $request->description,
            'date' => date('d-m-Y'),
        ]);

        $notification = [
            'message' => 'Post Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.post')->with($notification);

    }

    /**
    * Post edit
    */
    public function postEdit($id){
        $categories = PostCategory::latest()->get();
        $post = Post::findOrFail($id);
        return view('backend.post.edit_post', compact('categories', 'post'));
    }

    /**
    * Post delete
    */
    public function postUpdate(Request $request){
        $post_id = $request->id;

        $data = Post::findOrFail($post_id);

        // Post Image
        $save_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 480)->save('upload/post/'. $name_gen);
            $save_url = 'upload/post/'.$name_gen;
            if(file_exists($data->image) && !empty($data->image)){
                unlink($data->image);
            }
        }else {
            $save_url = $data->image;
        }

        //update post
        Post::findOrFail($post_id)->update([
            'user_id' => Auth::guard('admin')->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
            'image' => $save_url,
            'description' => $request->description,
            'date' => date('d-m-Y'),
        ]);

        $notification = [
            'message' => 'Post Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.post')->with($notification);

    }


    /**
    * Delete post
    */
    public function postDelete($id){

        $data = Post::findOrFail($id);

        if($data){
            if(file_exists($data->image) && !empty($data->image)){
                unlink($data->image);
            }

            $data->delete();

            $notification = [
                'message' => 'Post Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
