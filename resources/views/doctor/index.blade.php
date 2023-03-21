@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Doctors</li>
                </ol>
                <a href="{{route('doctor.create')}}"><button class="btn btn-primary float-end" >create doctor </button></a>
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
                       
                        <th>Name</th>
                        <th>Phone</th>
                       
                        <th>Department</th>
                        <th>Fee</th>
                        <th>Edit</th>
                       <th>Delate</th>


                    </tr>
                </thead>

                <tbody>
                @if(count($doctors)>0)
                    @foreach($doctors as $key=>$doctor)
                    <tr>
                        <td>{{$key+1}}</td>
                       
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->department->name}}</td>
                        <td>{{$doctor->fee}}</td>
                      
                        <td>
                           
                            <a href="{{route('doctor.edit',[$doctor->id])}}"><button class="btn btn-primary " >edit</button></a>
                           
                        </td>

                        <td>


                            <form action="{{route('doctor.destroy',[$doctor->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger " >delete</button> </form>
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
@endsection