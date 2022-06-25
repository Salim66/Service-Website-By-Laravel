<?php

namespace App\Http\Controllers\Backend;

use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SeoController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Seo::find(1);
        return view('backend.seo.edit', compact('data'));
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
        $data = Seo::findOrFail($id);

        $logo = '';
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            if (file_exists($data -> logo )){
                unlink($data -> logo);
            }
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 90)->save('upload/logo/'. $image_unique_name);
            $logo = 'upload/logo/'.$image_unique_name;
        }else {
            $logo = $data->logo;
        }

        $favicon = '';
        if($request->hasFile('favicon')){
            $image = $request->file('favicon');
            if (file_exists($data -> favicon )){
                unlink($data -> favicon);
            }
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(25, 25)->save('upload/favicon/'. $image_unique_name);
            $favicon = 'upload/favicon/'.$image_unique_name;
        }else {
            $favicon = $data->favicon;
        }

        $data->meta_title = $request->meta_title;
        $data->meta_author = $request->meta_author;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->google_analytics = $request->google_analytics;
        $data->footer_title = $request->footer_title;
        $data->footer_description = $request->footer_description;
        $data->logo = $logo;
        $data->favicon = $favicon;
        $data->update();

        $notification = [
            'message' => 'SEO Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('seo.edit')->with($notification);

    }

}
