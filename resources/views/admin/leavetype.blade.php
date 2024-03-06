@extends('layouts.master')

@section('title')
LMS | Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Leave Type</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leave Type</li>
                    </ol>
                </nav>
            </div>
            
            {{-- status msg --}}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success font-weight-bold" role="alert">
                        <i class="fa-solid fa-circle-check fa-2xl"></i>   {{session('status')}}
                    </div>
                @endif
            </div> 

            <div class="card-body">
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <a href="/addleave" class="btn btn-success font-weight-bold mt-4" >
                            <i class="fa-solid fa-plus"></i>&nbsp; Add Leave Type
                        </a>
                    </div>
                    <hr>
                    {{-- table --}}
                    <div class="table-responsive table-hover">
                        <table id="mydataTable" class="table-bordered">
                            <thead class=" text-light bg-dark ">
                                <th class="font-weight-bold">S.N.</th>

                                <th class="font-weight-bold  text-center">Leave Type</th>

                                <th class="font-weight-bold  text-center">Leave Category</th>

                                <th class="font-weight-bold  text-center">Tenure</th>

                                <th class="font-weight-bold  text-center">Duration</th>

                                <th class="font-weight-bold  text-center">Description</th>

                                <th class="font-weight-bold  text-center">Action</th>

                            </thead>
                            <tbody>
                               @foreach ($leavetype as $row)
                                    <tr>
                                        <input type="hidden" class="leavedelete_val_id" value="{{$row->leave_id}} ">
                                        
                                        <td class="text-center"> {{$row->leave_id}} </td>

                                        <td  class="text-center"> {{$row->leave_type}} </td>

                                        <td class="text-center"> {{$row->leave_category}} </td>

                                        <td class="text-center"> {{$row->leave_tenure}} </td>

                                        <td class="text-center"> {{$row->leave_duration}} Days</td>

                                        <td class="text-center"> {{$row->description}} </td>

                                        <td class="d-flex justify-content-center">
                                            <form action="leavetype_edit/{{$row->leave_id}}">
                                                <button type="submit" class="btn"> <i class="fa-regular fa-pen-to-square fa-xl" style="color: #d6dce6;" title="Edit"></i></button>
                                            </form>

                                            {{-- delete leave type --}}
                                            {{-- <form action="/leavetypedel/{{$row->leave_id}}" method="POST">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <input type="hidden" name="id" value=" {{$row->leave_id}}">
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-delete-left fa-xl" style="color: #f0f4f9;" title="Delete"></i></button>
                                            </form> --}}
                                            <button type="button" class="btn btn-danger leaveDelbtn">
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
        
        $('.leaveDelbtn').click(function (e) { 
            
            e.preventDefault();
            
            var delete_id = $(this).closest("tr").find('.leavedelete_val_id').val();
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
                            url: "leavetypedel/"+delete_id,
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
