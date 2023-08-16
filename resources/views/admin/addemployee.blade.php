@extends('layouts.master')

@section('title')
LMS | Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Registered Employee </h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </nav>
            </div>
            
            {{-- status msg --}}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success font-weight-bold" role="alert">
                        <i class="fa-solid fa-circle-check fa-2xl"></i> {{ session('status') }}    
                    </div>
                @endif
            </div> 

            <div class="card-body">
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <a href="/regemp" class="btn btn-success font-weight-bold mt-4" >
                            <i class="fa-solid fa-user-plus"></i>&nbsp; Add New Employee
                        </a>
                    </div>
                    <hr>
                    {{-- table --}}
                    <div class="table-responsive table-hover">
                        <table id="mydataTable" class="table-bordered">
                            <thead class=" text-light bg-dark ">
                                <th class="font-weight-bold">S.N.</th>

                                <th class="font-weight-bold">Name</th>

                                <th class="font-weight-bold">Post</th>

                                <th class="font-weight-bold">Marital Status</th>

                                <th class="font-weight-bold">Gender</th>

                                <th class="font-weight-bold">Joined Date</th>

                                <th class="font-weight-bold">Role</th>

                                <th class="font-weight-bold">Email</th>

                                <th class="font-weight-bold">Action</th>

                            </thead>
                            <tbody>
                                @foreach($users as $row)
                                <tr>
                                    <td> {{$row->id}} </td>
                                    <td> {{$row->name}} </td>
                                    <td> {{$row->post}} </td>
                                    <td> {{$row->maristatus}} </td>
                                    <td> {{$row->emp_gender}} </td>
                                    <td> {{$row->emp_joinDate}} </td>
                                    <td> {{$row->usertype}} </td>
                                    <td> {{$row->email}} </td>
                                    <td class="d-flex justify-content-center">
                                        {{-- edit --}}
                                        <form action="/emp_edit/{{$row->id}}">

                                            <button type="submit" class="btn">
                                                <i class="fa-regular fa-pen-to-square" title="Edit"></i>
                                            </button>
                                        </form>

                                        {{-- delete --}}
                                        <form action="/register/{{$row->id}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn">
                                                <i class="fa-solid fa-trash-can" title="Delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#mydataTable').DataTable();
        });
</script>
@endsection
