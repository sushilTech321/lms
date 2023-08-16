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
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->name_req}} </td>
                                    <td> {{$item->startdate}} </td>
                                    <td> {{$item->enddate}} </td>
                                    <td> {{$item->applied_on}} </td>
                                    <td><span class="badge badge-pill badge-info">{{$item->status}}</span></td>
                                    <td>
                                         {{-- <form action="takeaction">
                                             <button type="submit" class="btn btn-info btn-round font-weight-bold" title="view"> View </button>
                                         </form> --}}
                                         <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis fa-2xl" ></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                               
                                                <form action="/takeaction/{{$item->id}}">
                                                    @csrf
                                                    {{-- <a class="dropdown-item" href="{{url('takeaction')}}" class="dw dw-eye"></i> View</a> --}}
                                                    <button type="submit" class="dropdown-item" ><i class="fa-regular fa-eye fa-lg"></i> View</button>
                                                </form>

                                                <form action="admin_approve/{{$item->id}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    {{-- <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a> --}}
                                                    <input type="hidden" name="id" value=" {{$item->id}}">
                                                    <button type="submit" class="dropdown-item"><i class="fa-solid fa-trash fa-lg"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
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
