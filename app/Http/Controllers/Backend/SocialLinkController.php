<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Edit Data 
     */
    public function edit(){
        $data = Social::findOrFail(1);
        return view('backend.social.edit', compact('data'));
    }

    /**
     * Update Data
     */
    public function update(Request $request, $id){

        $data = Social::findOrFail($id);

        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->skype = $request->skype;
        $data->linkedin = $request->linkedin;
        $data->update();

        $notification = [
            'message' => 'Social Link Updated Successfully :)',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
