@extends('layouts.master')

@section('title')
LMS | Take Action
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary">Leave Types</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/leavetype">Leave Types</a></li>
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
                    <form action="/leavetype_edits/{{$leaveEdits->leave_id}}" method="POST" class="mt-3 ml-5">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- employee name --}}
                                    <label class=" font-weight-bold " for="name">Leave Type</label>
                                    <input type="text" name="leave_type"  value="{{$leaveEdits->leave_type}}" class="selectpicker form-control">
                                    <br>

                                    {{-- employee join date --}}
                                    <label class=" font-weight-bold" for="emp_name">Leave Category</label>
                                    <input type="text" name="leave_category" value="{{$leaveEdits->leave_category}}" class="form-control id="" aria-describedby="">
                                    <br>
                                </div>

                                <div class="col-md-4">
                                     {{-- employee email --}}
                                     <label class=" font-weight-bold" for="emp_name">Tenure</label>
                                     <input type="text" name="leave_tenure" value="{{$leaveEdits->leave_tenure}}" class="form-control id="" aria-describedby="">
                                     <br>
                                    
                                    {{-- employee post --}}
                                    <label class=" font-weight-bold" for="">Duration</label>
                                    <input type="number" name="leave_duration" value="{{$leaveEdits->leave_duration}}" class="form-control id="" aria-describedby="">
                                    <br>
                                </div>

                                <div class="col-md-4">
                                    {{-- employee gender --}}
                                    <label class=" font-weight-bold" for="emp_name">Description</label>
                                    <input type="text" name="description" value="{{$leaveEdits->description}}" class="form-control id="" aria-describedby="" >
                                    <br>
                                </div>
                            </div>
                        </div>    
                        {{-- Take action button --}}
                        <div class="form-group dropdown d-flex justify-content-center col-md-12">
                            <button type="submit" class="btn btn-success btn-round font-weight-bold">Update</button>
                            <a href="{{url('/leavetype')}}"  class="btn btn-danger btn-round font-weight-bold">Cancle</a>
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
