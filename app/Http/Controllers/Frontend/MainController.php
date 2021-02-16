<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Benefit;
use App\Models\City;
use App\Models\Slider;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index(){
       $cities = City::all();
       $sliders = Slider::all();
       $advantages = Advantage::all();
       $benefits = Benefit::all();
       return view('frontend.index', compact('cities', 'sliders', 'advantages', 'benefits'));
   }
}
