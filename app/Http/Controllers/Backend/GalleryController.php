<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{
    /**
     * Data view
     */
    public function galleryView(){
        $galleries = Gallery::latest()->get();
        return view('backend.gallery.gallery_view', compact('galleries'));
    }

    /**
     * Data store
     */
    public function galleryStore(Request $request){

        // Validation
        $request->validate([
            'image' => 'required'
        ],
        [
            'image.required' => 'Please insert one image'
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 500)->save('upload/gallery/'. $name_gen);
        $save_url = 'upload/gallery/'.$name_gen;

        Gallery::create([
            'image'   => $save_url
        ]);

        $notification = [
            'message' => 'Gallery Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data edit
     */
    public function galleryEdit($id){
        $data = Gallery::findOrFail($id);
        return view('backend.gallery.gallery_edit', compact('data'));
    }

    /**
     * Data update
     */
    public function galleryUpdate(Request $request){

        $gallery_id = $request->id;
        $old_image = $request->old_image;

        $save_url = '';
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 500)->save('upload/gallery/'. $name_gen);
            $save_url = 'upload/gallery/'.$name_gen;
            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }
        }else {
            $save_url = $old_image;
        }

        Gallery::findOrFail($gallery_id)->update([
            'image'   => $save_url
        ]);

        $notification = [
            'message' => 'Gallery Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('gallery.list')->with($notification);

    }

    /**
     * Data Delete
     */
    public function galleryDelete($id){
        $data = Gallery::findOrFail($id);

        if(file_exists($data->image) && !empty($data->image)){
            unlink($data->image);
        }

        $data->delete();

        $notification = [
            'message' => 'Gallery Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }
}
