@extends('layouts.master')

@section('title')
LMS | Take Action
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary">Leave Histroy</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Adminleave_history">Leave History</a></li>
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
                                    <input type=""  value="{{$history_view->name_req}}" class="selectpicker form-control" readonly>
                                    <br>

                                    {{-- employee join date --}}
                                    <label class=" font-weight-bold" for="emp_name">Join Date</label>
                                    <input type="text" name="joindate" value="{{$history_view->joindate}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                <div class="col-md-4">
                                     {{-- employee email --}}
                                     <label class=" font-weight-bold" for="emp_name">Email Address</label>
                                     <input type="text" name="email" value="{{$history_view->email}}" class="form-control id="" aria-describedby="" readonly>
                                     <br>
                                    
                                    {{-- employee post --}}
                                    <label class=" font-weight-bold" for="">Post</label>
                                    <input type="text" name="post" value="{{$history_view->post}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                <div class="col-md-4">
                                    {{-- employee gender --}}
                                    <label class=" font-weight-bold" for="emp_name">Gender</label>
                                    <input type="text" name="gender" value="{{$history_view->gender}}" class="form-control id="" aria-describedby=""  readonly>
                                    <br>

                                    {{-- employee marital status --}}
                                    <label class=" font-weight-bold" for="emp_name">Marital Status</label>
                                    <input type="text" name="maristatus" value="{{$history_view->maristatus}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- leave type --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Leave Type</label>
                                    <input type="text" value="{{$history_view->ltype_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- leave category --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Leave Category</label>
                                    <input type="text" value="{{$history_view->lcat_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- start date section --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="startDate">Leave Period</label>
                                    <input type="text" value="From   {{$history_view->startdate}}   To   {{$history_view->enddate}}" class="form-control"  aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- applied no. of days--}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Applied No. of Days</label> 
                                    <input type="text" value="{{$history_view->leave_days}}" id="output" class="form-control" readonly>
                                </div>

                                {{-- status --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Status</label> 
                                    <input type="text" value="{{$history_view->status}}" id="output" class="form-control font-weight-bold text-success" readonly>
                                </div>

                                {{-- admin remarks --}}
                                <div  class="col-md-4" >
                                    <label class=" font-weight-bold" for="">Admin Remarks</label> 
                                    <input type="text" value="{{$history_view->admin_remarks}}" class="form-control font-weight-bold text-info" readonly>
                                </div>
                            </div>
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
