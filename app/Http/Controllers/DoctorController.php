<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('doctor.index', compact('doctors'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:doctors',
            'phone' => 'required',
            'department_id' => 'required',
            'fee' => 'required'
        ]);
        $data = $request->all();
        Doctor::create($data);
        $doctors = Doctor::latest()->get();

        return view('doctor.index', compact('doctors'))->with('message', 'doctor has created');
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
        $doctor = Doctor::find($id);
        return view('doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $doctor = Doctor::find($id);
        $doctor->update($data);
        $doctors = Doctor::latest()->get();

        return view('doctor.index', compact('doctors'))->with('message', 'doctor hasupdated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->back()->with('message', 'doctor has delted');
    }
    
}
