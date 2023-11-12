@extends('layouts.master')

@section('title')
LMS | Change password
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary">Change Password</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change password</li>
                    </ol>
                </nav>
            </div>

            {{-- status msg --}}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success font-weight-bold" role="alert">
                        <i class="fa-regular fa-circle-check fa-xl"></i> {{ session('status') }}
                    </div>
                @endif
            </div>    

            {{-- withError msg --}}
            @if($errors->has('current_password'))
                <div class="alert alert-danger font-weight-bold ml-3">
                    <i class="fa-solid fa-circle-exclamation fa-xl" style="color: #f0f1f5;"></i> {{ $errors->first('current_password') }}
                </div>
            @endif
            
            <div class="card-body">
                <div class="card">
                    <form action="/admin_update_passwords" method="POST" class="mt-3 ml-5">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- current password--}}
                                    <label class=" font-weight-bold " for="name">Current Password</label>
                                    <input type="password" name="current_password"  value="" class="form-control" @required(true)>
                                    <br>

                                    {{-- New password--}}
                                    <label class=" font-weight-bold " for="name">New Password</label>
                                    <input type="password" name="new_password"  value="" class="form-control" @required(true)>
                                    <br>
                                    {{-- Confirm password--}}
                                    <label class=" font-weight-bold " for="name">Confirm Password</label>
                                    <input type="password" name="password"  value="" class="form-control @error('password') is-invalid @enderror" @required(true)>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <strong class="ml-2 mt-2 text-success" style="font-size:9px;">Password example: Abc@!12343 ,length: 8 char or more</strong>
                                </div>
                            </div>
                        </div>
                        {{-- Take action button --}}
                        <div class="form-group  col-md-12">
                            <button type="submit" class="btn btn-info btn-round font-weight-bold">Change Password</button>
                            <a href="{{url('/dashboard')}}"  class="btn btn-danger btn-round font-weight-bold">Cancle</a>
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
