<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
    * Customer view
    */
    public function customerManage(){
        $users = User::latest()->get();
        return view('backend.customer.view_customer', compact('users'));
    }

    /**
    * Customer view
    */
    public function customerView($id){
        $data = User::findOrFail($id);
        return view('backend.customer.single_customer', compact('data'));
    }


    /**
    * Delete customer
    */
    public function customerDelete($id){

        $data = User::findOrFail($id);

        if($data){
            $data->delete();

            $notification = [
                'message' => 'Customer Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
