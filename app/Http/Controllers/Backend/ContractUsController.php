<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContractUsController extends Controller
{
    /**
     * Edit Contract Us 
     */
    public function edit(){
        $data = ContactUs::findOrFail(1);
        return view('backend.contract-us.edit', compact('data'));
    }

    /**
     * Update Contract Us 
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'address' => 'required',
            'general_email' => 'required',
            'general_phone' => 'required',
            'business_email' => 'required',
            'business_phone' => 'required',
            'google_map_link' => 'required',
        ]);

        $data = ContactUs::findOrFail($id);

        $data->address = $request->address;
        $data->general_email = $request->general_email;
        $data->general_phone = $request->general_phone;
        $data->business_email = $request->business_email;
        $data->business_phone = $request->business_phone;
        $data->google_map_link = $request->google_map_link;
        $data->update();

        $notification = [
            'message' => 'Contract Us Updated Successfully :)',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
