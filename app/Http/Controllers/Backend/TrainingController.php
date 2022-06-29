<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingCategory;
use App\Http\Controllers\Controller;
use App\Models\TrainingSubCategory;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    /*
    * Add training
    */
    public function addTraining(){
        $categories = TrainingCategory::all();
        return view('backend.training.add_training', compact('categories'));
    }

    /**
    * Store training
    */
    public function trainingStore(Request $request){

        // Validation
        $request->validate([
            'training_category_id' => 'required',
            'title' => 'required',
            'image' => 'required',
        ]);

        // Service Image
        $save_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 416)->save('upload/training/'. $name_gen);
            $save_url = 'upload/training/'.$name_gen;
        }

        //store service
        Training::create([
            'user_id' => Auth::guard('admin')->user()->id,
            'training_category_id' => $request->training_category_id,
            'training_subcategory_id' => $request->training_subcategory_id,
            'title' => $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
            'image' => $save_url,
            'description' => $request->description,
            'date' => date('d-m-Y'),
        ]);

        $notification = [
            'message' => 'Training Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.training')->with($notification);

    }

    /**
    * Training view
    */
    public function trainingManage(){
        $trainines = Training::latest()->get();
        return view('backend.training.view_training', compact('trainines'));
    }

    /**
    * Training view
    */
    public function trainingView($id){
        $categories = TrainingCategory::latest()->get();
        $subcategories = TrainingSubCategory::latest()->get();
        $trainines = Training::findOrFail($id);
        return view('backend.training.single_training', compact('categories', 'subcategories','trainines'));
    }

    /**
    * Training edit
    */
    public function trainingEdit($id){
        $categories = TrainingCategory::latest()->get();
        $subcategories = TrainingSubCategory::latest()->get();
        $training = Training::findOrFail($id);
        return view('backend.training.edit_training', compact('categories', 'subcategories', 'training'));
    }

    /**
    * Training delete
    */
    public function trainingUpdate(Request $request){
        $training_id = $request->id;

        $data = Training::findOrFail($training_id);

        // Training Image
        $save_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 416)->save('upload/training/'. $name_gen);
            $save_url = 'upload/training/'.$name_gen;
            if(file_exists($data->image) && !empty($data->image)){
                unlink($data->image);
            }
        }else {
            $save_url = $data->image;
        }

        //update training
        Training::findOrFail($training_id)->update([
            'user_id' => Auth::guard('admin')->user()->id,
            'training_category_id' => $request->training_category_id,
            'training_subcategory_id' => $request->training_subcategory_id,
            'title' => $request->title,
            'title_slug' => strtolower(str_replace(' ', '-', $request->title)),
            'image' => $save_url,
            'description' => $request->description,
            'date' => date('d-m-Y'),
        ]);

        $notification = [
            'message' => 'Training Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.training')->with($notification);

    }


    /**
    * Delete training
    */
    public function trainingDelete($id){

        $data = Training::findOrFail($id);

        if($data){
            if(file_exists($data->image) && !empty($data->image)){
                unlink($data->image);
            }

            $data->delete();

            $notification = [
                'message' => 'Training Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
