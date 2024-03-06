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
                        <i class="fa-solid fa-circle-check fa-2xl"></i> {{session('status')}}    
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
                                    <input type="hidden" class="serdelete_val_id" value="{{$row->id}} ">
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
                                        {{-- <form action="/register/{{$row->id}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can" title="Delete"></i>
                                            </button>
                                        </form> --}}
                                        <button type="button" class="btn btn-danger serviceDeletebtn">
                                            <i class="fa-solid fa-trash-can" title="Delete"></i>
                                        </button>
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
        
        $('.serviceDeletebtn').click(function (e) { 
            
            e.preventDefault();
            
            var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
            // alert(delete_id);
            
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token" :  $('input[name="csrf-token"]').val(),
                            "id": delete_id,
                        };

                        $.ajax({
                            type: "DELETE",
                            url: "register/"+delete_id,
                            data: data,
                            // dataType: "dataType",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                swal(response.msg, {
                                    icon: "success",
                                })
                                .then((result) =>{
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        });
    });

</script>
@endsection
