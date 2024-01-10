<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    

    public function __invoke()
    {
        return view('Kidder.404');
    }

    public function index(){
        return view('Kidder.index');
    }
    public function about(){
        return view("Kidder.About");
    }
    public function classes(){
        return view("Kidder.classes");
    }
    public function contact(){
        return view("Kidder.contact");
    }
    public function facilities(){
        return view("Kidder.schoolFacilities");
    }
    public function teacher (){
      return view("Kidder.teacher");
    }
    public function call (){
        return view("Kidder.beTeacher");
      }
      public function appointment()  {
        return view("Kidder.appointment");
    }
    public function testimonial()  {
        return view("Kidder.Testimonial");
    }
}
