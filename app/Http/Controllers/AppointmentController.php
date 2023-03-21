<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
class AppointmentController extends Controller
{
    public function view()
    {
        $appointments = Appointment::orderByDesc('appointment_date')->paginate(10);
        return view('appointment.index', compact('appointments'));
    }
    public function index(Request $request)
    {
        $appointments = Appointment::orderBy('id', 'desc');
    
        // filter by appointment no
        if ($request->has('appointment_no')) {
            $appointments->where('appointment_no', $request->appointment_no);
        }
    
        // filter by appointment date
        if ($request->has('appointment_date')) {
            $appointments->where('appointment_date', $request->appointment_date);
        }
    
        // filter by doctor
        if ($request->has('doctor')) {
            $appointments->whereHas('doctor', function ($query) use ($request) {
                $query->where('id', $request->doctor);
            });
        }
    
        // filter by patient name
        if ($request->has('patient_name')) {
            $appointments->where('patient_name', 'like', '%' . $request->patient_name . '%');
        }
    
        // filter by patient phone
        if ($request->has('patient_phone')) {
            $appointments->where('patient_phone', $request->patient_phone);
        }
    
        $appointments = $appointments->paginate(10);
    
        return view('home', compact('appointments'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required|date',
            'doctor_id' => 'required',
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'paid_amount' => 'required',
        ]);

        $doctor = Doctor::findOrFail($request->input('doctor_id'));

        
        $appointmentCount = Appointment::where('doctor_id', $doctor->id)
            ->where('appointment_date', $request->input('appointment_date'))
            ->count();

        if ($appointmentCount >= 2) {
            return redirect()->back()->withErrors(['doctor' => 'This doctor has already reached the maximum appointments for the selected date.'])->withInput();
        }

    
        $appointment = Appointment::create([
            'appointment_no' => uniqid(),
            'appointment_date' => $request->input('appointment_date'),
            'doctor_id' => $doctor->id,
            'patient_name' => $request->input('patient_name'),
            'patient_phone' => $request->input('patient_phone'),
            'total_fee' => $request->input('fee'),
            'paid_amount' => $request->input('paid_amount'),
        ]);
        return redirect()->route('appointment.index')->with('success', 'Appointment added successfully.');
      
    }
    public function destroy( $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('message', 'appointment has delted');
    }
    
}
