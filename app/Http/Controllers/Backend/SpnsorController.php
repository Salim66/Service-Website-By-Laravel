<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Spnsor;
use Illuminate\Http\Request;
use Image;

class SpnsorController extends Controller
{
    /**
     * Data view
     */
    public function spnsorView(){
        $spnsors = Spnsor::latest()->get();
        return view('backend.spnsor.spnsor_view', compact('spnsors'));
    }

    /**
     * Spnsor store
     */
    public function spnsorStore(Request $request){

        // Validation
        $request->validate([
            'image' => 'required'
        ],
        [
            'image.required' => 'Please insert one image'
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(210, 95)->save('upload/spnsor/'. $name_gen);
        $save_url = 'upload/spnsor/'.$name_gen;

        Spnsor::create([
            'image'   => $save_url
        ]);

        $notification = [
            'message' => 'Spnsor Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Spnsor edit
     */
    public function spnsorEdit($id){
        $data = Spnsor::findOrFail($id);
        return view('backend.spnsor.spnsor_edit', compact('data'));
    }

    /**
     * Spnsor update
     */
    public function spnsorUpdate(Request $request){

        $spnsor_id = $request->id;
        $old_image = $request->old_image;

        $save_url = '';
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(210, 95)->save('upload/spnsor/'. $name_gen);
            $save_url = 'upload/spnsor/'.$name_gen;
            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }
        }else {
            $save_url = $old_image;
        }

        Spnsor::findOrFail($spnsor_id)->update([
            'image'   => $save_url
        ]);

        $notification = [
            'message' => 'Spnsor Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.spnsor')->with($notification);

    }

    /**
     * Spnsor Delete
     */
    public function spnsorDelete($id){
        $data = Spnsor::findOrFail($id);

        if(file_exists($data->image) && !empty($data->image)){
            unlink($data->image);
        }

        $data->delete();

        $notification = [
            'message' => 'Spnsor Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }
}
