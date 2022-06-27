<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ReturnPolicy;
use Illuminate\Http\Request;

class ReturnPolicyController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = ReturnPolicy::latest()->get();
        return view('backend.return.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        ReturnPolicy::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = [
            'message' => 'Return Policy Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('return.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = ReturnPolicy::findOrFail($id);
        return view('backend.return.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = ReturnPolicy::findOrFail($id);

        if($data){
            $this->validate($request, [
                'question' => 'required',
                'answer' => 'required'
            ]);

             $data->question = $request->question;
             $data->answer = $request->answer;
             $data->update();

            $notification = [
                'message' => 'Return Policy Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('return.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = ReturnPolicy::findOrFail($id);

        if($data){

            $data->delete();

            $notification = [
                'message' => 'Return Policy Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
