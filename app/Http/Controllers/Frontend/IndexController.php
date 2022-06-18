<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
