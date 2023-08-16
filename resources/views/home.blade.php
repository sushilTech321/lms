@extends('layouts.empmaster')

@section('title')
    LMS | Employee
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> My Dashboard </h4>
            </div>
            <div class="card-body">
                {{-- pending application --}}
                <div class="card bg-secondary p-4" style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-solid fa-spinner mt-1" style="color: #e0e6f0;"></i> &nbsp; Pending Application
                    </span>
                    <span class="text-light d-flex justify-content-center font-weight-bold"> {{$pendingLeave}} </span>
                </div>

                {{-- approved application --}}
                <div class="card bg-secondary  p-4 " style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-regular mt-1 fa-square-check"></i> &nbsp; Approved Application
                    </span>
                    <span class="text-light d-flex justify-content-center font-weight-bold"> {{$approvedLeave}} </span>
                </div>
                  
                {{-- decline application --}}
                <div class="card bg-secondary  p-4 " style="width: 20rem;">
                    <span class="text-light d-flex justify-content-center font-weight-bold">
                        <i class="fa-solid mt-1 fa-square-xmark"></i> &nbsp; Declined Application
                    </span>
                    <span class="text-light d-flex justify-content-center font-weight-bold"> {{$rejectLeave}} </span>
                </div>
            </div>

            {{-- leave type and balance --}}
            <div class="card-body ">
                <div class="card bg-secondary p-4" style="width:65em;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead  class=" text-light">
                                <th class="font-weight-normal text-center"> <i class="fa-solid fa-table mt-1 style="color: #cad3e2;"></i> &nbsp;  Leave Types </th>
                                <th class="font-weight-normal text-center"> <i class="fa-solid fa-table mt-1 style="color: #cad3e2;"></i> &nbsp; Leave Category </th>
                                <th class="font-weight-normal text-center"> <i class="fa-solid fa-table mt-1 style="color: #cad3e2;"></i> &nbsp;  Tenure </th>
                                <th class="font-weight-normal text-center"> <i class="fa-solid mt-1 fa-calendar-days"></i> &nbsp;Your Leave Balance</th>
                            </thead>
                            <tbody class="text-light">
                                @foreach ($leaveTypes as $leaveType)
                                    <tr>
                                        <td class="text-center"> {{$leaveType->leave_type}} </td>
                                        <td class="text-center">{{$leaveType->leave_category}}</td>
                                        <td class="text-center">{{$leaveType->leave_tenure}}</td>
                                        <td class="text-center">{{$leaveType->leave_duration}} Days</td>
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

@endsection

