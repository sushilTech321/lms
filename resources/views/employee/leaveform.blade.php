@extends('layouts.empmaster')

@section('title')
    LMS | Leave Form
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Leave Form </h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Apply Leave</li>
                    </ol>
                </nav>
            </div>

             {{-- status msg --}}
             <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success font-weight-bold" role="alert">
                        <i class="fa-solid fa-check fa-2xl"></i> &nbsp; {{ session('status') }}
                    </div>
                @endif
            </div> 

            <div class="card-body ">
                <div class="card">
                    <div class="">
                        {{-- employee registration section --}}
                        <form action="/reqinsert" method="post" class="mt-3 ml-5" >
                            @csrf
                            <div class="container">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-4" id="div1">
                                        {{-- employee name --}}
                                        <label class="d-flex justify-content-center font-weight-bold " for="emp_name">Name</label>
                                        <input type="text" name="name_req" value="{{$employeeData->name}}" class="form-control font-weight-bold" readonly>
                                        <br>

                                        {{-- employee post --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="">Post</label>
                                        <input type="text" name="post" value="{{$employeeData->post}}" class="form-control font-weight-bold" aria-describedby="" readonly>
                                        <br>

                                        {{-- leave type --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="">Leave Type</label>
                                        <select id="firstDropdown" name="ltype_req" onchange="updateDropdown(1)" class="custom-select form-control font-weight-normal dropdown-toggle" required="">
                                            <option value="" selected disabled>Select Leave Type</option>
                                            <option value="Paid">Paid</option>
                                        </select>
                                        <br><br>

                                        {{-- start date section --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="startDate">Start Date</label>
                                        <input type="date" value="" name="startdate" class="form-control font-weight-normal" id="startDate" aria-describedby="" required>
                                        <br>

                                        {{-- applied date --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="">Apply Date</label> 
                                        <input type="date" name="applied_on" class="form-control font-weight-normal" required>
                                    </div>

                                    <div class="col-md-4" id="div2"> 
                                        {{-- employee join date --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="emp_name">Join Date</label>
                                        <input type="text" name="joindate" value="{{$employeeData->emp_joinDate}}" class="form-control font-weight-bold" aria-describedby="" readonly>
                                        <br>

                                        {{-- employee email --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="emp_name">Email</label>
                                        <input type="text" name="email" value="{{$employeeData->email}}" class="form-control font-weight-bold" aria-describedby="" readonly>
                                        <br>

                                        {{-- leave category --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="">Leave Category</label>
                                        <select name="lcat_req" class="custom-select form-control font-weight-normal dropdown-toggle" required="">
                                            <option selected disabled>Select Leave Category</option>
                                            <option value="Annual">Annual</option>
                                            <option value="Sick">Sick</option>
                                            <option value="Maternity">Maternity</option>
                                            <option value="Paternity">Paternity</option>
                                        </select>
                                        <br><br>

                                        {{--  end date section --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="endDate">End Date</label>
                                        <input type="date" value="" name="enddate" class="form-control font-weight-normal" id="endDate" aria-describedby="" required>
                                        <br>

                                        {{-- Users id --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="">User Id</label> 
                                        <input type="text" name="users_id"  value="{{$employeeData->id}}" class="form-control font-weight-bold" readonly>
                                    </div>

                                    <div class="col-md-4">
                                        {{-- employee marital status --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="emp_name">Marital Status</label>
                                        <input type="text" name="maristatus" value="{{$employeeData->maristatus}}" class="form-control font-weight-bold" id="" aria-describedby="" readonly>
                                        <br>

                                        {{-- employee gender --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="emp_name">Gender</label>
                                        <input type="text" name="gender" value="{{$employeeData->emp_gender}}" class="form-control font-weight-bold" aria-describedby=""  readonly>
                                        <br>
                                        
                                        {{-- Attachments --}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="">Attachments (optional)</label>
                                        <input type="file" class="form-control font-weight-normal" name="attachments">
                                        <br>

                                        {{-- Leave of days--}}
                                        <label class="d-flex justify-content-center font-weight-bold" for="">Leave Days</label> 
                                        <input type="text" name="leave_days" id="output" class="form-control font-weight-bold" placeholder="Enter Days" required>
                                        <br>
                                    </div>
                                </div>
                            </div><br>
                            {{-- register button --}}
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit"  class="btn btn-round btn-info font-weight-bold">Submit</button>
                                &nbsp;
                            <a href="{{url('/home')}}" class="btn btn-danger btn-round font-weight-bold">Cancle</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function CalculateDays(){
        var d1 = document.getElementById("startDate").value;
        var d2 = document.getElementById("endDate").value;

        const dateOne = new Date(d1);
        const dateTwo = new Date(d2);

        const time = Math.abs(dateTwo-dateOne);
        const days = Math.ceil(time/(1000* 60 * 60 *24));
        document.getElementById('output').innerHTML=days; 
        
    }
</script>
@endsection