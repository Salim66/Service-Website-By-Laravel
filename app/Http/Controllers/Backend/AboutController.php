<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = About::find(1);
        return view('backend.about.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about_id = $request->id;
        $old_image = $request->old_image;

        $save_url = '';
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(1170, 420)->save('upload/about/'. $name_gen);
            $save_url = 'upload/about/'.$name_gen;
            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }
        }else {
            $save_url = $old_image;
        }

        About::findOrFail($about_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image'   => $save_url
        ]);

        $notification = [
            'message' => 'About Us Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('about.edit')->with($notification);

    }
}
