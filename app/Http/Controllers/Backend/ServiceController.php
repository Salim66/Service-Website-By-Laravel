<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class ServiceController extends Controller
{
    /*
    * Add service
    */
    public function addService(){
        $categories = Category::all();
        return view('backend.service.add_service', compact('categories'));
    }

    /**
    * Store service
    */
    public function serviceStore(Request $request){

        // Validation
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'image' => 'required',
        ]);

        // Service Image
        $save_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 416)->save('upload/service/'. $name_gen);
            $save_url = 'upload/service/'.$name_gen;
        }

        // Service File
        $file_save_url = '';
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file_gen = hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
            $file->move(public_path('upload/service/file/'), $file_gen);
            $file_save_url = 'upload/service/file/'.$file_gen;
        }

        //store service
        Service::create([
            'user_id' => Auth::guard('admin')->user()->id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'title' => $request->title,
            'image' => $save_url,
            'file' => $file_save_url,
            'description' => $request->description,
            'date' => date('d-m-Y'),
        ]);

        $notification = [
            'message' => 'Service Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.service')->with($notification);

    }

    /**
    * service view
    */
    public function serviceManage(){
        $services = Service::latest()->get();
        return view('backend.service.view_service', compact('services'));
    }

    /**
    * Service view
    */
    public function serviceView($id){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $service = Service::findOrFail($id);
        return view('backend.service.single_service', compact('categories', 'subcategories', 'subsubcategories', 'service'));
    }

    /**
    * Service edit
    */
    public function serviceEdit($id){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $service = Service::findOrFail($id);
        return view('backend.service.edit_service', compact('categories', 'subcategories', 'subsubcategories', 'service'));
    }

    /**
    * Service delete
    */
    public function serviceUpdate(Request $request){
        $service_id = $request->id;

        $data = Service::findOrFail($service_id);

        // Service Image
        $save_url = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 416)->save('upload/service/'. $name_gen);
            $save_url = 'upload/service/'.$name_gen;
            if(file_exists($data->image) && !empty($data->image)){
                unlink($data->image);
            }
        }else {
            $save_url = $data->image;
        }

        // Service File
        $file_save_url = '';
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file_gen = hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
            $file->move(public_path('upload/service/file/'), $file_gen);
            $file_save_url = 'upload/service/file/'.$file_gen;
            if(file_exists($data->file) && !empty($data->file)){
                unlink($data->file);
            }
        }else {
            $file_save_url = $data->file;
        }

        //update service
        Service::findOrFail($service_id)->update([
            'user_id' => Auth::guard('admin')->user()->id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'title' => $request->title,
            'title' => $request->title,
            'image' => $save_url,
            'file' => $file_save_url,
            'description' => $request->description,
            'date' => date('d-m-Y'),
        ]);

        $notification = [
            'message' => 'Service Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('manage.service')->with($notification);

    }


    /**
    * Delete service
    */
    public function serviceDelete($id){

        $data = Service::findOrFail($id);

        if($data){
            if(file_exists($data->image) && !empty($data->image)){
                unlink($data->image);
            }

            if(file_exists($data->file) && !empty($data->file)){
                unlink($data->file);
            }

            $data->delete();

            $notification = [
                'message' => 'Service Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }



    }
}
