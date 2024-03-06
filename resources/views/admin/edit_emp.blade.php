@extends('layouts.master')

@section('title')
LMS | Employee Edit
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary">Employee Details</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/register">Registered Employee</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
            
            {{-- status msg --}}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-danger font-weight-bold" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div> 

            <div class="card-body">
                <div class="card">
                    <form action="/emp_edits/{{$empEdit->id}}" method="POST" class="mt-3 ml-5">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- employee name --}}
                                    <label class=" font-weight-bold " for="name">Full Name</label>
                                    <input type="text" name="name"  value="{{$empEdit->name}}" class="selectpicker form-control">
                                    <br>

                                    {{-- employee join date --}}
                                    <label class=" font-weight-bold" for="emp_name">Join Date</label>
                                    <input type="text" name="emp_joinDate" value="{{$empEdit->emp_joinDate}}" class="form-control id="" aria-describedby="">
                                    <br>
                                </div>

                                <div class="col-md-4">
                                     {{-- employee email --}}
                                     <label class=" font-weight-bold" for="emp_name">Email Address</label>
                                     <input type="email" name="email" value="{{$empEdit->email}}" class="form-control id="" aria-describedby="">
                                     <br>
                                    
                                    {{-- employee post --}}
                                    <label class=" font-weight-bold" for="">Post</label>
                                    <input type="text" name="post" value="{{$empEdit->post}}" class="form-control id="" aria-describedby="">
                                    <br>
                                </div>

                                <div class="col-md-4">
                                    {{-- employee gender --}}
                                    <label class=" font-weight-bold" for="emp_name">Gender</label>
                                    <input type="text" name="emp_gender" value="{{$empEdit->emp_gender}}" class="form-control id="" aria-describedby="" >
                                    <br>

                                    {{-- employee marital status --}}
                                    <label class=" font-weight-bold" for="emp_name">Marital Status</label>
                                    <input type="text" name="maristatus" value="{{$empEdit->maristatus}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                                
                        {{-- Take action button --}}
                        <div class="form-group dropdown d-flex justify-content-center col-md-12">
                            <button type="submit" class="btn btn-success btn-round font-weight-bold">Update</button>
                            <a href="{{url('/register')}}"  class="btn btn-danger btn-round font-weight-bold">Cancle</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
