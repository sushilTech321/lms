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
                                    <label class="font-weight-bold" for="emp_name">Full Name</label>
                                    <input type="text"  value="{{$action->name_req}}" class="selectpicker form-control font-weight-bold" readonly>
                                    <br>
                                    
                                    {{-- employee join date --}}
                                    <label class=" font-weight-bold" for="emp_name">Join Date</label>
                                    <input type="text" name="joindate" value="{{$action->joindate}}" class="form-control font-weight-bold" aria-describedby="" readonly>
                                    <br>

                                    {{-- leave type --}}
                                    <label class=" font-weight-bold" for="">Leave Type</label>
                                    <input type="text" value="{{$action->ltype_req}}" class="form-control font-weight-bold" id="" aria-describedby="" readonly>
                                    <br>

                                    {{-- applied no. of days--}}
                                    <label class=" font-weight-bold" for="">Applied No. of Days</label> 
                                    <input type="text" value="{{$action->leave_days}}" id="output" class="form-control font-weight-bold" readonly>
                              
                                </div>

                                <div class="col-md-4">
                                     {{-- employee email --}}
                                     <label class=" font-weight-bold" for="emp_name">Email Address</label>
                                     <input type="text" name="email" value="{{$action->email}}" class="form-control font-weight-bold" aria-describedby="" readonly>
                                     <br>
                                    
                                    {{-- employee post --}}
                                    <label class=" font-weight-bold" for="">Post</label>
                                    <input type="text" name="post" value="{{$action->post}}" class="form-control font-weight-bold" aria-describedby="" readonly>
                                    <br>

                                    {{-- leave category --}}
                                    <label class=" font-weight-bold" for="">Leave Category</label>
                                    <input type="text" value="{{$action->lcat_req}}" class="form-control font-weight-bold" id="" aria-describedby="" readonly>
                                    <br>

                                    {{-- status --}}
                                    <label class=" font-weight-bold" for="">Status</label> 
                                    <input type="text" value="{{$action->status}}" id="output" class="form-control font-weight-bold text-secondary" readonly>
                                </div>

                                <div class="col-md-4">
                                    {{-- employee gender --}}
                                    <label class=" font-weight-bold" for="emp_name">Gender</label>
                                    <input type="text" name="gender" value="{{$action->gender}}" class="form-control font-weight-bold" aria-describedby=""  readonly>
                                    <br>

                                    {{-- employee marital status --}}
                                    <label class=" font-weight-bold" for="emp_name">Marital Status</label>
                                    <input type="text" name="maristatus" value="{{$action->maristatus}}" class="form-control font-weight-bold" aria-describedby="" readonly>
                                    <br>

                                    {{-- start date section --}}
                                    <label class=" font-weight-bold" for="startDate">Leave Period</label>
                                    <input type="text" value="From   {{$action->startdate}}   To   {{$action->enddate}}" class="form-control font-weight-bold"  aria-describedby="" readonly>
                                    <br>

                                    {{-- admin remarks --}}
                                    <label class=" font-weight-bold" for="">Admin Remarks</label> 
                                    <input type="text" name="admin_remarks" id="" value="{{$action->admin_remarks}}" class="form-control font-weight-bold text-secondary" required>
                                </div>
                            </div>
                        </div>
                        <br>
                         {{-- Take action button --}}
                        <div class="form-group dropdown d-flex justify-content-center col-md-12">
                            <select id="firstDropdown" name="status" class="custom-select form-control dropdown-toggle" required="" style="width:14em; height:em;">
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
