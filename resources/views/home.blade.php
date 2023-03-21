@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Appointment List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="search-form" method="GET" class="form-inline mb-3">
        <div class="form-group mr-3">
            <input type="text" name="appointment_no" placeholder="Appointment No." class="form-control" value="{{ request()->input('appointment_no') }}">
        </div>
        <div class="form-group mr-3">
            <input type="date" name="appointment_date" placeholder="Appointment Date" class="form-control" value="{{ request()->input('appointment_date') }}">
        </div>
        <div class="form-group mr-3">
            <input type="text" name="doctor" placeholder="Doctor" class="form-control" value="{{ request()->input('doctor') }}">
        </div>
        <div class="form-group mr-3">
            <input type="text" name="patient_name" placeholder="Patient Name" class="form-control" value="{{ request()->input('patient_name') }}">
        </div>
        <div class="form-group mr-3">
            <input type="text" name="patient_phone" placeholder="Patient Phone" class="form-control" value="{{ request()->input('patient_phone') }}">
        </div>
        <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary" style="margin-top: 31px;">Search</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary" style="margin-top: 31px; margin-left: 10px;">Reset</a>
                    </div>
    </form>
                    <table class="table table-bordered">
        <thead>
            <tr>
            <th>No.</th>
                <th>Appointment No.</th>
                <th>Appointment Date</th>
                <th>Doctor</th>
                <th>Patient Name</th>
                <th>Patient Phone</th>
            </tr>
        </thead>
           <tbody>
                @if(count($appointments)>0)
                    @foreach($appointments as $key=>$appointment)
                    <tr>
                        <td>{{$key+1}}</td>
                       
                        <td>{{ $appointment->appointment_no }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->patient_name }}</td>
                    <td>{{ $appointment->patient_phone }}</td>
                      
                      

                       
                    </tr>
                    @endforeach
                   
                    @else
                    <td><strong>No data to display</strong></td>
                    @endif
                  



                </tbody>
    </table>
    {{ $appointments->links() }}
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
