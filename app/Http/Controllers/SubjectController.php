<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use App\Traits\Common;

class SubjectController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::paginate(2);
        return view('admin.subject.list', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::get();
        return view('admin.subject.add', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|max:50',
            'age'=>'required',
            'time' =>'required',
            'cost'=>'required',
            'teacher_id'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $data['image'] = $this->uploadFile($request->image, 'admin/images');    
        $data['published'] = isset($request->published);
        Subject::create($data);
        return redirect()->route('admin.subject.list');
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
        $subject = Subject::findOrFail($id);
        $teachers = Teacher::get();
        return view('admin.subject.edit', compact('subject','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|max:50',
            'age'=>'required',
            'time' =>'required',
            'cost'=>'required',
            'teacher_id'=>'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
        $subject = Subject::findOrFail($id);
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'admin/images');    
            $data['image'] = $fileName;
            unlink("admin/images/" . $subject->image);
        }
        $data['published'] = isset($request->published);
        Subject::where('id', $id)->update($data);
        return redirect()->route('admin.subject.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject =  Subject::findOrFail($id);
        unlink("admin/images/" . $subject->image);
        Subject::where('id', $id)->delete();
        return redirect()->back();
    }

    public function messages()
    {
        return[
            'name.required'=>'please enter your name',
            'age'=>'Should be between(2,5)',
            "teacher_id.required"=> "select Teacher",
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ]; 
    }
}
