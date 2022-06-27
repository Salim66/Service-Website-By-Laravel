<?php

namespace App\Http\Controllers\Backend;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PolicyController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Policy::latest()->get();
        return view('backend.policy.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        Policy::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'Policy Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('policy.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Policy::findOrFail($id);
        return view('backend.policy.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Policy::findOrFail($id);

        if($data){
            $this->validate($request, [
                'question' => 'required',
                'answer' => 'required'
            ]);

             $data->question = $request->question;
             $data->answer = $request->answer;
             $data->update();

            $notification = [
                'message' => 'Policy Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('policy.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Policy::findOrFail($id);

        if($data){

            $data->delete();

            $notification = [
                'message' => 'Policy Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
