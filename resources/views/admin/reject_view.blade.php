@extends('layouts.master')

@section('title')
LMS | Take Action
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary">Decline Leave</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/rejected_leave">Decline Leave</a></li>
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
                                    <input type=""  value="{{$rejectView->name_req}}" class="selectpicker form-control" readonly>
                                    <br>

                                    {{-- employee join date --}}
                                    <label class=" font-weight-bold" for="emp_name">Join Date</label>
                                    <input type="text" name="joindate" value="{{$rejectView->joindate}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>
                                    
                                    {{-- leave type --}}
                                    <label class=" font-weight-bold" for="">Leave Type</label>
                                    <input type="text" value="{{$rejectView->ltype_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>

                                    {{-- applied no. of days--}}
                                    <label class=" font-weight-bold" for="">Applied No. of Days</label> 
                                    <input type="text" value="{{$rejectView->leave_days}}" id="output" class="form-control" readonly>
                                </div>

                                <div class="col-md-4">
                                     {{-- employee email --}}
                                     <label class=" font-weight-bold" for="emp_name">Email Address</label>
                                     <input type="text" name="email" value="{{$rejectView->email}}" class="form-control id="" aria-describedby="" readonly>
                                     <br>
                                    
                                    {{-- employee post --}}
                                    <label class=" font-weight-bold" for="">Post</label>
                                    <input type="text" name="post" value="{{$rejectView->post}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>

                                    {{-- leave category --}}
                                    <label class=" font-weight-bold" for="">Leave Category</label>
                                    <input type="text" value="{{$rejectView->lcat_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>

                                    {{-- status --}}
                                    <label class=" font-weight-bold" for="">Status</label> 
                                    <input type="text" value="{{$rejectView->status}}" id="output" class="form-control font-weight-bold text-success " readonly>
                                </div>

                                <div class="col-md-4">
                                    {{-- employee gender --}}
                                    <label class=" font-weight-bold" for="emp_name">Gender</label>
                                    <input type="text" name="gender" value="{{$rejectView->gender}}" class="form-control id="" aria-describedby=""  readonly>
                                    <br>

                                    {{-- employee marital status --}}
                                    <label class=" font-weight-bold" for="emp_name">Marital Status</label>
                                    <input type="text" name="maristatus" value="{{$rejectView->maristatus}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>

                                    {{-- start date section --}}
                                    <label class=" font-weight-bold" for="startDate">Leave Period</label>
                                    <input type="text" value="From   {{$rejectView->startdate}}   To   {{$rejectView->enddate}}" class="form-control"  aria-describedby="" readonly>
                                    <br>
                                    
                                    {{-- admin remarks --}}
                                    <label class=" font-weight-bold" for="">Admin Remarks</label> 
                                    <input type="text" name="admin_remarks" id="" value="{{$rejectView->admin_remarks}}" class="form-control font-weight-bold text-secondary" readonly>
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
