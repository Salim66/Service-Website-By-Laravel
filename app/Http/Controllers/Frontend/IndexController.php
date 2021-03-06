<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\About;
use App\Models\Policy;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Category;
use App\Models\Training;
use App\Models\SubCategory;
use App\Models\Capabilities;
use App\Models\GRICertified;
use App\Models\PostCategory;
use App\Models\ReturnPolicy;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\TrainingCategory;
use App\Models\TrainingSubCategory;
use App\Http\Controllers\Controller;
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
        $all_data = Service::where('category_id', $category->id)->latest()->paginate(9);
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

     /**
     * Category Wise Services Search
     */
    public function cateogrywiseServices($cat_id, $slug){
        $all_data = Service::where('category_id', $cat_id)->orderBy('id', 'DESC')->get();
        $category = Category::findOrFail($cat_id);
        return view('frontend.service.cateogry_services', compact('all_data', 'category'));
    }

    /**
     * SubCategory Wise Services Search
     */
    public function subCateogrywiseServices($subcat_id, $slug){
        $all_data = Service::where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->get();
        $subcategory = SubCategory::findOrFail($subcat_id);
        return view('frontend.service.subcateogry_services', compact('all_data', 'subcategory'));
    }

    /**
     * Sub-SubCategory Wise Services Search
     */
    public function subSubCateogrywiseServices($subsubcat_id, $slug){
        $all_data = Service::where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->get();
        $subsubcategory = SubSubCategory::findOrFail($subsubcat_id);
        return view('frontend.service.subsubcateogry_services', compact('all_data', 'subsubcategory'));
    }

    /**
     * Single Blog
     */
    public function singleBlog($slug){
        $data = Post::where('title_slug', $slug)->first();
        return view('frontend.single_blog', compact('data'));
    }

    /**
     * All Blog
     */
    public function allBlog(){
        $all_data = Post::latest()->paginate(9);
        return view('frontend.blog', compact('all_data'));
    }

    /**
     * Category Wise Post
     */
    public function categoryWisePost($slug){
        $category = PostCategory::where('post_category_slug', $slug)->first();
        $all_data = Post::where('category_id', $category->id)->latest()->paginate(9);
        return view('frontend.category_wise_blog', compact('all_data', 'category'));
    }

    /**
     * Blog Search
     */
    public function blogSearch(Request $request){
        $search = $request->search;
        $all_data = Post::where('title', 'LIKE', '%'.$search.'%')->latest()->paginate(9);
        return view('frontend.search_box_wise_blog', compact('all_data', 'search'));
    }

    /**
     * Service Search
     */
    public function serviceSearch(Request $request){
        $search = $request->search;
        $all_data = Service::where('title', 'LIKE', '%'.$search.'%')->latest()->paginate(9);
        return view('frontend.search_box_wise_service', compact('all_data', 'search'));
    }

    /**
     * About Page
     */
    public function aboutUs(){
        $data = About::find(1);
        return view('frontend.about_us', compact('data'));
    }

    /**
     * Our Capabilities Page
     */
    public function ourCapabilities(){
        $data = Capabilities::find(1);
        return view('frontend.our_capabilities', compact('data'));
    }

    /**
     * GRI Certified Page
     */
    public function griCertified(){
        $data = GRICertified::find(1);
        return view('frontend.gri_certified', compact('data'));
    }

    /**
     * Privacy Policy page
     */
    public function privacyPolicy(){
        $all_data = Policy::all();
        return view('frontend.privacy_policy', compact('all_data'));
    }

    /**
     * Return Policy page
     */
    public function returnPolicy(){
        $all_data = ReturnPolicy::all();
        return view('frontend.return_policy', compact('all_data'));
    }

    /**
     * Gallery page
     */
    public function gallery(){
        $all_data = Gallery::latest()->get();
        return view('frontend.gallery', compact('all_data'));
    }

    
    /**
     * Category Wise Training Search
     */
    public function cateogrywiseTraining($cat_id, $slug){
        $all_data = Training::where('training_category_id', $cat_id)->orderBy('id', 'DESC')->get();
        $category = TrainingCategory::findOrFail($cat_id);
        return view('frontend.training.cateogry_training', compact('all_data', 'category'));
    }

    /**
     * SubCategory Wise Training Search
     */
    public function subCateogrywiseTraining($subcat_id, $slug){
        $all_data = Training::where('training_subcategory_id', $subcat_id)->orderBy('id', 'DESC')->get();
        $subcategory = TrainingSubCategory::findOrFail($subcat_id);
        return view('frontend.training.subcateogry_training', compact('all_data', 'subcategory'));
    }
    
    /**
     * Training Details Page
     */
    public function trainingDetails($slug){
        $data = Training::where('title_slug', $slug)->first();
        return view('frontend.training_details', compact('data'));
    }

    /**
     * Category Wise Training
     */
    public function categoryWiseTraining($slug){
        $category = TrainingCategory::where('training_category_slug', $slug)->first();
        $all_data = Training::where('training_category_id', $category->id)->latest()->paginate(9);
        return view('frontend.category_wise_training', compact('all_data', 'category'));
    }

}
