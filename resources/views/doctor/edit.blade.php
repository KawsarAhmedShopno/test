@extends('layouts.app')

@section('content')
<div class="container mt-5">
   
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <form action="{{route('doctor.update',[$doctor->id])}}" method="post" enctype="multipart/form-data">@csrf
        {{method_field('PATCH')}}

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Information</div>
                    <div class="card-body">
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control " value="{{$doctor->name}} ">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                       
       

                        <div class="form-group">
                            <label>phone</label>
                            <input type="number" name="phone" class="form-control "value="{{$doctor->phone}}">
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

                                <option value="{{$department->id}}"@if($doctor->department_id==$department->id)selected @endif>{{$department->name}}</option>
                                @endforeach



                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fee</label>
                            <input type="text" name="fee" class="form-control "value="{{$doctor->fee}} ">
                            @error('fee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    <button class="btn btn-primary " type="submit">Update</button>
                 
                </div>
            </div>

        </div>
    </form>
</div>

@endsection