<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Capabilities;
use Illuminate\Http\Request;
use Image;

class CapabilitiesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Capabilities::find(1);
        return view('backend.capabilities.edit', compact('data'));
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
            Image::make($image)->resize(1170, 420)->save('upload/capabilities/'. $name_gen);
            $save_url = 'upload/capabilities/'.$name_gen;
            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }
        }else {
            $save_url = $old_image;
        }

        Capabilities::findOrFail($about_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image'   => $save_url
        ]);

        $notification = [
            'message' => 'Our Capabilities Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('capabilities.edit')->with($notification);

    }
}
