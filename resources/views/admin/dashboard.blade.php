@extends('layouts.master')

@section('title')
LMS | Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Dashboard </h4>
            </div>
            <div class="card-body">
                {{-- pending section --}}
                <div class="card bg-dark p-4" style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-solid fa-spinner mt-1" style="color: #e0e6f0;"></i> &nbsp; Pending Application
                    </span> <br>
                    <span  class="text-light d-flex justify-content-center font-weight-bold"> {{$pendingLeave}} </span>
                </div>

                {{-- approved section --}}
                <div class="card bg-dark p-4 " style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-regular mt-1 fa-square-check"></i> &nbsp; Approved Application
                    </span><br>
                    <span  class="text-light d-flex justify-content-center font-weight-bold"> {{$approvedLeave}} </span>
                </div>

                {{-- declined section --}}
                <div class="card bg-dark p-4 " style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-solid mt-1 fa-square-xmark"></i>  &nbsp;  Declined Application
                    </span><br>
                    <span  class="text-light d-flex justify-content-center font-weight-bold"> {{$rejectLeave}} </span>
                </div>

                {{-- registered employee --}}
                <div class="card bg-dark p-4" style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-solid fa-user-group mt-1" style="color: #bac5d8;"></i> &nbsp; Registered Employee
                    </span><br>
                    <span  class="text-light d-flex justify-content-center font-weight-bold"> {{$users}} </span>
                </div>

                {{-- available leave types --}}
                <div class="card bg-dark p-4" style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-solid fa-table mt-1 style="color: #cad3e2;"></i> &nbsp; Available Leave Types
                    </span><br>
                    <span  class="text-light d-flex justify-content-center font-weight-bold"> {{$leavetype}} </span>
                </div><br><br>

                {{-- recent list --}}
                <span class="font-weight-bold ml-4">Recent List</span>
                <div class="card p-2" >
                    {{-- table --}}
                    <div class="table-responsive">
                        <table id="mydataTable" class="table-bordered">
                            <thead class=" text-light bg-success">
                                <th class="font-weight-bold">S.N.</th>

                                <th class="font-weight-bold">Name</th>

                                <th class="font-weight-bold">Leave Type</th>

                                <th class="font-weight-bold">Leave Category</th>

                                <th class="font-weight-bold">Start Leave Date</th>

                                <th class="font-weight-bold">End Leave Date</th>

                                <th class="font-weight-bold">Applied On</th>

                                <th class="font-weight-bold">Status</th>
                            </thead>
                            <tbody>
                                @foreach ($recentRequests as $row)
                                    <tr class="">
                                        <td> {{$row->id}} </td>
                                        <td> {{$row->name_req}} </td>
                                        <td> {{$row->ltype_req}} </td>
                                        <td> {{$row->lcat_req}} </td>
                                        <td> {{$row->startdate}} </td>
                                        <td> {{$row->enddate}} </td>
                                        <td> {{$row->applied_on}} </td>
                                        <td> <span class="badge badge-pill badge-secondary"> {{$row->status}} </span> </td>
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
