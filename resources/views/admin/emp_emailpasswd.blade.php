@extends('layouts.master')

@section('title')
LMS | Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Employee's email and password </h4>
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
                    <div class="d-flex justify-content-center">
                        <form action="{{url('/empemailpass')}}" method="post" class="mt-3 ml-5" >
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
