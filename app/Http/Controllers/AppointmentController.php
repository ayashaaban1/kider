<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Appointment::get();
        return view('admin.appointment.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gurdianName' =>'required|string|max:50',
            'gurdianEmail' =>'required|email',
            'childName' => 'required|string|max:50',
            'childAge' => 'required|integer',
            'message' => 'required|string'
        ]);
        Appointment::create($data);
        return redirect()->back()->with('The request has been registered successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Appointment::findOrFail($id);
        return view('admin.appointment.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appointment::where('id', $id)->delete();
        return redirect()->route('admin.appointment.list');
    }
}
