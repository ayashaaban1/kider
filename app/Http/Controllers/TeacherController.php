<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Traits\Common;

class TeacherController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::get();
        return view('admin.teacher.list', compact('teacher'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|max:50',
            'title'=>'required|max:50',
            'fb'=>'required',
            'twitter'=>'required',
            'insta'=>'sometimes',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $data['image'] = $this->uploadFile($request->image, 'admin/images');    
        $data['published'] = isset($request->published);
        Teacher::create($data);
        return redirect()->route('admin.teacher.list');
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
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|max:50',
            'title'=>'required|max:50',
            'fb'=>'required',
            'twitter'=>'required',
            'insta'=>'sometimes',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $teacher = Teacher::findOrFail($id);
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'admin/images');    
            $data['image'] = $fileName;
            unlink("admin/images/" . $teacher->image);
        }
        $data['published'] = isset($request->published);
        Teacher::where('id', $id)->update($data);
        return redirect()->route('admin.teacher.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::where('teacher_id', $id)->count();
        if($subject){
            return back()->with('Error',"This teacher hasMany subject. It can't be deleted");
        }else{
            $teacher = Teacher::findOrFail($id);
            unlink("admin/images/" . $teacher->image);
            Teacher::where('id', $id)->delete();
            return redirect()->back();
        }
    }
      
    public function messages()
    {
        return[
            'name.required'=>'please enter your name',
            'title'=>'Should be string',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ]; 
    }
}
