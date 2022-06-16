<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    /**
     * Admin Profile View
     */
    public function adminProfileView() {
        $profile_data = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.admin_profile_view', compact('profile_data'));
    }

    /**
     * Admin Profile Edit
     */
    public function adminProfileEdit() {
        $data = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.admin_profile_edit', compact('data'));
    }

    /**
     * Admin Profile update
     */
    public function adminProfileStore(Request $request){
        $data = Admin::where('id', Auth::guard('admin')->user()->id)->first();

        $data->name = $request->name;
        $data->email = $request->email;

        // image upload
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file -> getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            if(file_exists('upload/admin_images/'.$data->profile_photo_path) && !empty($data->profile_photo_path)){
                unlink('upload/admin_images/'.$data->profile_photo_path);
            }
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.profile')->with($notification);

    }
}
