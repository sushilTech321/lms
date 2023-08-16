@extends('layouts.master')

@section('title')
LMS | Register Employee
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Register Employee </h4>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="d-flex justify-content-center">
                        {{-- employee registration section --}}
                        <form action="{{url('/store')}}" method="post" class="mt-3 ml-5" >
                            @csrf
                            
                            {{-- emp name --}}
                            <div class="form-group " style="width:25em">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby="" placeholder="Full Name" required>
                               
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- emp post --}}
                            <div class="form-group " style="width:25em">
                                <select name="post" class="custom-select form-control dropdown-toggle" required="">
                                    <option selected disabled>Select Employee Post</option>
                                    <option value="Web Developer">Web Developer</option>
                                    <option value="App Developer">App Developer</option>
                                    <option value="QA">QA</option>
                                    <option value="Graphics Designer">Graphics Designer</option>
                                    <option value="Web Designer">Web Designer</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="HR">HR</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="CEO">CEO</option>    
                                </select>
                                
                                @error('post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            {{-- emp marital status --}}
                            <div class="form-group " style="width:25em">
                                <select name="maristatus" class="custom-select form-control dropdown-toggle" required="">
                                    <option selected disabled>Select Marital Status</option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>

                                @error('maristatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- emp gender --}}
                            <div class="form-group " style="width:25em">
                                <select name="emp_gender" class="custom-select form-control dropdown-toggle" required="">
                                    <option selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            {{-- emp role --}}
                            <div class="form-group " style="width:25em">
                                <select name="usertype" class="custom-select form-control dropdown-toggle" required="">
                                    <option selected disabled>Select Role</option>
                                    <option value="Employee">Employee</option>
                                </select>
                            </div>

                            {{-- emp join date --}}
                            <div class="form-group " style="width:25em">
                                <label for="emp_joinDate" class="ml-4">Employee Join date</label>
                                <input type="date" name="emp_joinDate" class="form-control @error('emp_joinDate') is-invalid @enderror" id="" aria-describedby="" placeholder="" required>
                               
                                @error('emp_joinDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- emp email and password --}}
                            <div class="pl-4  mb-1">
                                <small class="text-danger">Set employee's email and password.</small>
                            </div>

                            {{--emp email --}}
                            <div class="form-group " style="width:25em">
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Email" required>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{--emp password --}}
                            <div class="form-group" style="width:25em">
                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                              
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- confirm password --}}
                            {{-- <div class="form-group" style="width:25em">
                                <input id="" type="password" class="form-control"  name="emp_confirm_passwd" id="confirm_password" required  placeholder="Confirm Password">
                            </div> --}}

                            {{-- register button --}}
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-round btn-primary font-weight-normal">Register</button>
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

@endsection
