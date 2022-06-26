<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SliderController extends Controller
{
    /**
     * Slider view
     */
    public function sliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    /**
     * Slider store
     */
    public function sliderStore(Request $request){

        // Validation
        $request->validate([
            'slider_img' => 'required'
        ],
        [
            'slider_img.required' => 'Please insert one image'
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 850)->save('upload/slider/'. $name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::create([
            'slider_title' => $request->slider_title,
            'slider_descp' => $request->slider_descp,
            'slider_img'   => $save_url
        ]);

        $notification = [
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Slider edit
     */
    public function sliderEdit($id){
        $data = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('data'));
    }

    /**
     * Slider update
     */
    public function sliderUpdate(Request $request){

        $slider_id = $request->id;
        $old_image = $request->old_image;

        $save_url = '';
        if($request->file('slider_img')){
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 850)->save('upload/slider/'. $name_gen);
            $save_url = 'upload/slider/'.$name_gen;
            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }
        }else {
            $save_url = $old_image;
        }

        Slider::findOrFail($slider_id)->update([
            'slider_title' => $request->slider_title,
            'slider_descp' => $request->slider_descp,
            'slider_img'   => $save_url
        ]);

        $notification = [
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.slider')->with($notification);

    }

    /**
     * Slider Delete
     */
    public function sliderDelete($id){
        $data = Slider::findOrFail($id);

        if(file_exists($data->slider_img) && !empty($data->slider_img)){
            unlink($data->slider_img);
        }

        $data->delete();

        $notification = [
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }

}
