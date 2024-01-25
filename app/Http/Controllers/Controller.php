<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use App\Models\Teacher;
use App\Models\Subject;
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
        $teacher=Teacher::where("published",1)->get();
        $subject=Subject::where("published",1)->get();
        $test =Testimonial::where('published',1)->latest()->take(3)->get();
        return view('Kidder.index',compact('test','subject','teacher'));
    }
    public function about(){
        $teacher=Teacher::where("published","1")->get();
        return view("Kidder.About",compact("teacher"));
    }
    public function classes(){
        $subject=Subject::where("published",1)->get();
        $test =Testimonial::where('published',1)->latest()->take(3)->get();
        return view("Kidder.classes",compact('test','subject'));
    }
    public function contact(){
        return view("Kidder.contact");
    }
    public function facilities(){
        return view("Kidder.schoolFacilities");
    }
    public function teacher (){
        $teacher = Teacher::where('published', 1)->get();
        return view("Kidder.teacher", compact('teacher'));
    }
    public function call (){
        return view("Kidder.beTeacher");
      }
      public function appointment()  {
        return view("Kidder.appointment");
    }
    public function testimonial()  {
        $test =Testimonial::where('published',1)->latest()->take(3)->get();
        return view("Kidder.Testimonial",compact('test'));
    }
}
