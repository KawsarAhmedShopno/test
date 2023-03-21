@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-5">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">create appointment</li>
                </ol>
              
            </nav>
            <form action="{{route('appointment.store')}}" method="post" enctype="multipart/form-data">@csrf

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Appointment Creation</div>
            <div class="card-body">
                <div class="form-group">
                    <label>Appointment</label>
                    <input type="date" name="appointment_date" class="form-control " required="">
                    @error('appointment_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
               
             
                <div class="form-group">
                    <label>Department</label>
                    <select class="form-control"  id="department"name="department_id" required="">
                        @foreach(App\Models\Department::all() as $department)

                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach



                    </select>
                </div>
                <div class="form-group">
                    <label>doctor</label>
                    <select class="form-control"id="doctor" name="doctor_id" required="">
                        @foreach(App\Models\Doctor::all() as $doctor)

                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                        @endforeach



                    </select>
                </div>
                <div class="form-group">
                    <label>Fee</label>
                    <input type="number" name="fee" class="form-control" required="">
                    @error('fee')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>patient_name</label>
                    <input type="text" name="patient_name" class="form-control" required="">
                    @error('patient_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>patient_phone</label>
                    <input type="number" name="patient_phone" class="form-control" required="">
                    @error('patient_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>paid_amount</label>
                    <input type="number" name="paid_amount" class="form-control" required="">
                    @error('paid_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-primary " type="submit">submit</button>
            </div>
        </div>
    </div>
    
    
</div>

</form>
<div class="col-md-12 float-end">


<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">all appointment</li>
                </ol>
              
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif


            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SN</th>
                      
                <th>Appointment Date</th>
                <th>Doctor</th>
                <th>Fee</th>
               
                        <th>action</th>


                    </tr>
                </thead>

                <tbody>
                @if(count($appointments)>0)
                    @foreach($appointments as $key=>$appointment)
                    <tr>
                        <td>{{$key+1}}</td>
                       
                      
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->doctor->fee }}</td>
                
                      
                   

                        <td>


                        <form action="{{ route('appointment.destroy', $appointment->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                        </td>
                    </tr>
                    @endforeach
                   
                    @else
                    <td><strong>No data to display</strong></td>
                    @endif
                  



                </tbody>
            </table>

        </div>
    </div>
    </div>
    {{ $appointments->links() }}
</div>
<script type="text/javascript">
	
</script>  
@endsection