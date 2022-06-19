<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactMessage extends Controller
{
    /**
     * All Contact Message show
     */
    public function allMessage(){
        $all_data = Contact::latest()->get();
        return view('backend.contact-message.index', compact('all_data'));
    }

    /**
     * Contact Message Delete
     */
    public function contactMDelete($id){
        Contact::where('id', $id)->delete();

        $notification = [
            'message' => 'Contact Delete Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
