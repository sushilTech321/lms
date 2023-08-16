@extends('layouts.master')

@section('title')
LMS | Take Action
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary">Leave Details  </h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin_approve">Approval Pending</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Take Action</li>
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
                    <form action="/takeactions/{{$action->id}}" method="POST" class="ml-5 mt-4" >
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- employee name --}}
                                    <label class=" font-weight-bold " for="emp_name">Full Name</label>
                                    <input type=""  value="{{$action->name_req}}" class="selectpicker form-control" readonly>
                                    <br>

                                    {{-- employee join date --}}
                                    <label class=" font-weight-bold" for="emp_name">Join Date</label>
                                    <input type="text" name="joindate" value="{{$action->joindate}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                <div class="col-md-4">
                                     {{-- employee email --}}
                                     <label class=" font-weight-bold" for="emp_name">Email Address</label>
                                     <input type="text" name="email" value="{{$action->email}}" class="form-control id="" aria-describedby="" readonly>
                                     <br>
                                    
                                    {{-- employee post --}}
                                    <label class=" font-weight-bold" for="">Post</label>
                                    <input type="text" name="post" value="{{$action->post}}" class="form-control id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                <div class="col-md-4">
                                    {{-- employee gender --}}
                                    <label class=" font-weight-bold" for="emp_name">Gender</label>
                                    <input type="text" name="gender" value="{{$action->gender}}" class="form-control id="" aria-describedby=""  readonly>
                                    <br>

                                    {{-- employee marital status --}}
                                    <label class=" font-weight-bold" for="emp_name">Marital Status</label>
                                    <input type="text" name="maristatus" value="{{$action->maristatus}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- leave type --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Leave Type</label>
                                    <input type="text" value="{{$action->ltype_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- leave category --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Leave Category</label>
                                    <input type="text" value="{{$action->lcat_req}}" class="form-control" id="" aria-describedby="" readonly>
                                    <br>
                                </div>

                                {{-- start date section --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="startDate">Leave Period</label>
                                    <input type="text" value="From   {{$action->startdate}}   To   {{$action->enddate}}" class="form-control"  aria-describedby="" readonly>
                                    <br>
                                </div>

                                  {{-- applied no. of days--}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Applied No. of Days</label> 
                                    <input type="text" value="{{$action->leave_days}}" id="output" class="form-control" readonly>
                                </div>

                                {{-- status --}}
                                <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Status</label> 
                                    <input type="text" value="{{$action->status}}" id="output" class="form-control font-weight-bold text-secondary" readonly>
                                </div>

                                <div  class="col-md-4" >
                                    <label class=" font-weight-bold" for="">Admin Remarks</label> 
                                    {{-- <textarea name="admin_remarks" type="text" id="" cols="40" rows="2" placeholder="Admin Remarks" class="form-control mt-2"></textarea> --}}
                                    <input type="text" name="admin_remarks" id="" value="{{$action->admin_remarks}}" class="form-control font-weight-bold text-secondary">
                                </div>

                                {{-- number of days--}}
                                {{-- <div class="col-md-4">
                                    <label class=" font-weight-bold" for="">Leave Days</label> 
                                    <input type="text" name="" id="output" class="form-control" readonly>
                                </div> --}}
                            </div>
                        </div>
                        <br>
                         {{-- Take action button --}}
                        <div class="form-group dropdown d-flex justify-content-center col-md-12">
                            <select id="firstDropdown" name="status" class="custom-select form-control dropdown-toggle" required="" style="width:14em;">
                                <option value="" selected disabled>Select Action</option>
                                <option value="approved">Approve</option>
                                <option value="rejected">Reject</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-round font-weight-bold">Submit</button>
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
