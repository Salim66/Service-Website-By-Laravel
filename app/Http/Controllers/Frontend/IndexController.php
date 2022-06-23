<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Home Page Load
     */
    public function index(){
        return view('frontend.index');
    }

    /**
     * Contact Page
     */
    public function contactUs(){
        return view('frontend.contact_us');
    }

    /**
     * Contact Store
     */
    public function contactStore(Request $request){
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'message' => $request->message,
        ]);

        Session::flash('success_message', 'Your information send successfully :)');
        return redirect()->back();
    }

    /**
     * Service Details Page
     */
    public function serviceDetails($slug){
        $data = Service::where('title_slug', $slug)->first();
        return view('frontend.service_details', compact('data'));
    }

    /**
     * Service Details pdf download
     */
    public function downloadServicePDF($id){
        // Check user is authenticated or not
        if(Auth::guard('web')->check()){
            $data = Service::findOrFail($id);
            return view('frontend.service-pdf', compact('data'));
        }else {
            // Session::flash('error_message', 'Please login first your account!');
            // return redirect()->back();

            return view('auth.login', compact('id'));
        }
        
    }

    /**
     * Category Wise Service
     */
    public function categoryWiseService($slug){
        $category = Category::where('category_slug', $slug)->first();
        $all_data = Service::where('category_id', $category->id)->latest()->get();
        return view('frontend.category_wise_service', compact('all_data', 'category'));
    }

    /**
     * Date Wise Search Service
     */
    public function dateWiseSearchService(Request $request){

        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start_date = date('d-m-Y', strtotime($request->start_date));
        $end_date = date('d-m-Y', strtotime($request->end_date));

        $all_data = Service::whereBetween('date', [$start_date, $end_date])->get();
 
        return view('frontend.date_wise_service', compact('all_data', 'start_date', 'end_date'));

    }

}
