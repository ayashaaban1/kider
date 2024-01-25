<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;

class Testimonialcontroller extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.list', compact('testimonials'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|max:50',
            'job'=>'required|max:50',
            'comment'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $fileName = $this->uploadFile($request->image, 'admin/images');    
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Testimonial::create($data);
        return redirect()->route('admin.testimonial.list');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|max:50',
            'job'=>'required|max:50',
            'comment'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $testimonial = Testimonial::findOrFail($id);
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'admin/images');    
            $data['image'] = $fileName;
            unlink("admin/images/" . $testimonial->image);
        }
        $data['published'] = isset($request->published);
        Testimonial::where('id', $id)->update($data);
        return redirect()->route('admin.testimonial.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect()->route('admin.testimonial.list');
    }

     
    public function messages()
    {
        return[
            'name.required'=>'please enter your name',
            'job.string'=>'Should be string',
            'comment.required'=> 'should be text',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ]; 
    }
}
