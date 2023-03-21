@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <form action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">@csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Doctor Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control " required="">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                       
                     

                        <div class="form-group">
                            <label>phone</label>
                            <input type="number" name="phone" class="form-control ">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <select class="form-control" name="department_id" required="">
                                @foreach(App\Models\Department::all() as $department)

                                <option value="{{$department->id}}">{{$department->name}}</option>
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
                        
                        <button class="btn btn-primary " type="submit">create</button>
                    </div>
                </div>
            </div>
            
            
        </div>
        
    </form>
    
</div>

@endsection