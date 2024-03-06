@extends('layouts.master')

@section('title')
LMS | Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Pending Leave </h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pending Request</li>
                    </ol>
                </nav>
            </div>

            {{-- status msg --}}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success font-weight-bold" role="alert">
                        <i class="fa-solid fa-circle-check fa-xl"></i> {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="card-body">
                <div class="card">
                    {{-- table --}}
                    <div class="table-responsive  table-hover">
                        <table id="mydataTable" class="table-bordered">
                            <thead class=" text-light bg-dark ">
                                <th class="font-weight-bold">S.N.</th>

                                <th class="font-weight-bold">Name</th>

                                <th class="font-weight-bold">From</th>

                                <th class="font-weight-bold">To</th>

                                <th class="font-weight-bold">Applied On</th>

                                <th class="font-weight-bold">Status</th>
                                
                                <th class="font-weight-bold">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($approvepend as $item)
                                    <tr>
                                        <input type="hidden" class="penleavedel_val_id" value="{{$item->id}} ">
                                        <td> {{$item->id}} </td>
                                        <td> {{$item->name_req}} </td>
                                        <td> {{$item->startdate}} </td>
                                        <td> {{$item->enddate}} </td>
                                        <td> {{$item->applied_on}} </td>
                                        <td><span class="badge badge-pill badge-info">{{$item->status}}</span></td>
                                        <td class="d-flex justify-content-center">
                                            
                                            {{-- <div class="dropdown"> --}}
                                             
                                                {{-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis fa-2xl" >rdfdf</i>
                                                </a> --}}

                                                {{-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> --}}
                                                    {{-- view section --}}
                                                    {{-- <form action="/takeaction/{{$item->id}}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item" ><i class="fa-regular fa-eye fa-lg"></i> View</button>
                                                    </form> --}}

                                                    {{-- delete section --}}
                                                    {{-- <form action="admin_approve/{{$item->id}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <input type="hidden" name="id" value=" {{$item->id}}">
                                                        <button type="submit" class="dropdown-item"><i class="fa-solid fa-trash fa-lg"></i> Delete</button>
                                                    </form> --}}
                                                {{-- </div> --}}
                                            {{-- </div> --}}
                                              
                                            {{-- view --}}
                                            <form action="/takeaction/{{$item->id}}">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary" ><i class="fa-regular fa-eye fa-lg" title="View"></i></button>
                                            </form>
                                            {{-- Delete --}}
                                            {{-- <form action="admin_approve/{{$item->id}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <input type="hidden" name="id" value=" {{$item->id}}">
                                                    <button type="submit" class="btn btn-danger" ><i class="fa-solid fa-trash fa-lg" title="Delete"></i></button>
                                            </form> --}}

                                            <button type="button" class="btn btn-danger penleaveDelbtn">
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

        $('.penleaveDelbtn').click(function (e) { 
            
            e.preventDefault();
            
            var delete_id = $(this).closest("tr").find('.penleavedel_val_id').val();
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
                            url: "admin_approve/"+delete_id,
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
