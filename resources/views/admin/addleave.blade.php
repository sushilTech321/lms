@extends('layouts.master')

@section('title')
LMS | Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-secondary"> Add Leave Type </h4>
            </div>
            <div class="card-body">
                <div class="card"><br><br>
                    <div class="d-flex justify-content-center">
                        <form action="{{url('/leavestore')}}" method="POST">
                            @csrf

                            {{-- leave type --}}
                            <div class="form-group " style="width:25em">
                                {{-- <input type="text" name="leavetype" class="form-control" id="" aria-describedby="" placeholder="Leave Type"> --}}
                                
                                {{--leave type --}}
                                <select id="firstDropdown" name="leave_type" onchange="updateDropdown(1)" class="custom-select form-control dropdown-toggle" required="">
                                    <option value="" selected disabled>Select Leave Type</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
                                </select>
                                <br><br>

                                {{--leave category --}}
                                <select id="secondDropdown" name="leave_category"  onchange="updateDropdown(2)"  class="custom-select form-control dropdown-toggle" required="">
                                    <option value="" selected disabled>Select Leave Category</option>
                                </select>
                                <br><br>

                                {{-- leave tenure --}}
                                <select id="thirdDropdown" name="leave_tenure"  onchange="updateDropdown(3)" class="custom-select form-control dropdown-toggle  @error('leave_tenure') is-invalid @enderror" >
                                    <option value="" disabled selected >Tenure</option>
                                </select>

                                {{-- error msg --}}
                                @error('leave_tenure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br><br>

                                {{-- Duration --}}
                                <input type="text" id="fourthDropdown" name="leave_duration"  class="form-control  @error('leave_duration') is-invalid @enderror" placeholder="Enter Duration">
                                
                                {{-- error msg --}}
                                @error('leave_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- description --}}
                            <div class="form-group" >
                                <textarea name="description" id="" cols="40" rows="1" placeholder="Description" class="form-control"></textarea>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-round btn-primary font-weight-normal">Add Leave</button>
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
<script>
    const items = {
    Paid: {
        Annual: ["From 1 years To 2 years","From 2 years To 4 years","From 5 years To 7 years"],
        Sick: ["For All Employees"],
        Maternity: ["Only For Female Employee"],
        Paternity: ["Only For Male Employee"],
    },
    Unpaid: {
        // Tour_leave: ["not specified"],
        // Unscheduled_leave: ["not specified"],
    },
    };

    function updateDropdown(level) {
        const firstDropdown = document.getElementById("firstDropdown");
        const secondDropdown = document.getElementById("secondDropdown");
        const thirdDropdown = document.getElementById("thirdDropdown");
        const fourthDropdown = document.getElementById("fourthDropdown");

        if (level === 1) {
            secondDropdown.innerHTML = '<option value="" disabled selected>Select Leave Category</option>';
            thirdDropdown.innerHTML = '<option value="" selected disabled>Tenure</option>';
            fourthDropdown.innerHTML = '<option value="" selected disabled>Duration</option>';

            const selectedCategory = firstDropdown.value;
            if (selectedCategory !== "") {
                const itemList = Object.keys(items[selectedCategory]);
                for (let i = 0; i < itemList.length; i++) {
                    const option = document.createElement("option");
                    option.value = itemList[i];
                    option.text = itemList[i];
                    secondDropdown.appendChild(option);
                }
            }
        } 
        else if (level === 2) {
            thirdDropdown.innerHTML = '<option value="" selected disabled>Tenure</option>';
            fourthDropdown.innerHTML = '<option value="" selected disabled>Duration</option>';

            const selectedCategory = firstDropdown.value;
            const selectedItem = secondDropdown.value;
            if (selectedCategory !== "" && selectedItem !== "") {
                const variationList = items[selectedCategory][selectedItem];
                for (let i = 0; i < variationList.length; i++) {
                    const option = document.createElement("option");
                    option.value = variationList[i];
                    option.text = variationList[i];
                    thirdDropdown.appendChild(option);
                }
            }
        }
        else if (level === 3) {
            fourthDropdown.innerHTML = '<option value="" selected disabled>Duration</option>';
        }
    }
</script>
@endsection
