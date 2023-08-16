@extends('layouts.master')

@section('title')
LMS | Take Action
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary">Approved Leave</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/approved_leave">Approved Leave</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
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
                    <form action="" method="" class="mt-3 ml-5" >
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- employee name --}}
                                    <label class=" font-weight-bold " for="emp_name">Full Name</label>
                                    <input type=""  value="{{$approveView->name_req}}" class="selectpicker form-control" readonly>
                                    <br>

                                    {{-- employee join date --}}
                                    <label class=" font-weight-bold" for="emp_name">Join Date</label>
                                    <input type="text" name="joindate" value="{{$approveView->joindate}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                <div class="col-md-4">
                                     {{-- employee email --}}
                                     <label class=" font-weight-bold" for="emp_name">Email Address</label>
                                     <input type="text" name="email" value="{{$approveView->email}}" class="form-control id="" aria-describedby="" readonly>
                                     <br>
                                    
                                    {{-- employee post --}}
                                    <label class=" font-weight-bold" for="">Post</label>
                                    <input type="text" name="post" value="{{$approveView->post}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                <div class="col-md-4">
                                    {{-- employee gender --}}
                                    <label class=" font-weight-bold" for="emp_name">Gender</label>
                                    <input type="text" name="gender" value="{{$approveView->gender}}" class="form-control id="" aria-describedby=""  readonly>
                                    <br>

                                    {{-- employee marital status --}}
                                    <label class=" font-weight-bold" for="emp_name">Marital Status</label>
                                    <input type="text" name="maristatus" value="{{$approveView->maristatus}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- leave type --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Leave Type</label>
                                    <input type="text" value="{{$approveView->ltype_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- leave category --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Leave Category</label>
                                    <input type="text" value="{{$approveView->lcat_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- start date section --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="startDate">Leave Period</label>
                                    <input type="text" value="From   {{$approveView->startdate}}   To   {{$approveView->enddate}}" class="form-control"  aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- applied no. of days--}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Applied No. of Days</label> 
                                    <input type="text" value="{{$approveView->leave_days}}" id="output" class="form-control" readonly>
                                </div>

                                {{-- status --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Status</label> 
                                    <input type="text" value="{{$approveView->status}}" id="output" class="form-control font-weight-bold text-success " readonly>
                                </div>

                                <div  class="col-md-4" >
                                    <label class=" font-weight-bold" for="">Admin Remarks</label> 
                                    <input type="text" name="admin_remarks" id="" value="{{$approveView->admin_remarks}}" class="form-control font-weight-bold text-secondary" readonly>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
