<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    public function home(){
        $data['slider']= Slider::where('status', 'active')->get();
        return view('frontend.pages.home' , $data);
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }

    public function services(){
        return view('frontend.pages.services');
    }
    public function specialities(){
        return view('frontend.pages.specialities');
    }

    public function appointment_table(){
        return view('frontend.pages.appointment');
    }
    public function doctor(){
        return view('frontend.pages.doctor');
    }
    // public function login(){
    //     return view('frontend.login');
    // }
}
