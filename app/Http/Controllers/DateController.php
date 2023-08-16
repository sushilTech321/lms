<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Leavetype;

class DateController extends Controller
{
    public function DataCount(){

        $loggedInUserId = Auth::id();
        $employeeData = User::where('id', $loggedInUserId)->first();
        return view('/employee.leaveform',compact('employeeData'));
    }

}
