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
}
