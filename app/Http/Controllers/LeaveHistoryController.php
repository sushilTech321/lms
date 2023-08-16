<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Leaverequest;

class LeaveHistoryController extends Controller
{
    public function index(){

        // $retrieve =Leaverequest::all();
        $user = auth()->user();
        $leaveHistory = $user->Leaverequests()->get();
        return view('employee.myhistory',compact('leaveHistory'));
    }
}
