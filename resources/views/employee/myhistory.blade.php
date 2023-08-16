@extends('layouts.empmaster')

@section('title')
    LMS | My History
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title font-weight-bold text-secondary"> My Leave History</h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leave history</li>
                    </ol>
                </nav>
            </div>

            <div class="card-body ">
                <div class="card">
                     <div class="table-responsive table-hover">
                        <table id="mydataTable" class="table-bordered">
                            <thead class=" text-light bg-dark">
                                <th class="font-weight-bold">S.N.</th>

                                <th class="font-weight-bold">Leave Type</th>

                                <th class="font-weight-bold">Leave Category</th>

                                <th class="font-weight-bold">From</th>

                                <th class="font-weight-bold">To</th>

                                <th class="font-weight-bold">Applied On</th>

                                <th class="font-weight-bold">Status</th>

                                <th class="font-weight-bold">Admin Remarks</th>
                            </thead>
                            <tbody>
                                @foreach ($leaveHistory as $item)
                                    <tr>
                                        <td> {{$item->id}} </td>
                                        <td> {{$item->ltype_req}} </td>
                                        <td> {{$item->lcat_req}} </td>
                                        <td> {{$item->startdate}} </td>
                                        <td> {{$item->enddate}} </td>
                                        <td> {{$item->applied_on}} </td>
                                        <td> <span class="badge badge-pill badge-primary">{{$item->status}}</span> </td>
                                        <td> <span class="badge badge-pill badge-info">{{$item->admin_remarks}}</span> </td>
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

{{-- js --}}
@section('scripts')
<script>
    $(document).ready( function () {
        $('#mydataTable').DataTable();
        });
</script>
@endsection