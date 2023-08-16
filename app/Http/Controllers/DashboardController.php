<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leavetype;
use App\Models\Leaverequest;

class DashboardController extends Controller
{
    //register employee count
    public function countData(){

        $users = User::where('usertype', '!=', 'admin')->count();   //registered employee count section
        $leavetype = Leavetype :: count();  //leavetype count section
        $pendingLeave = Leaverequest:: where('status','pending')->count();
        $approvedLeave = Leaverequest:: where('status','approved')->count();
        $rejectLeave = Leaverequest:: where('status','rejected')->count();
        $recentRequests = Leaverequest::orderBy('id', 'desc')->get();
        return view('/admin.dashboard', compact('users','leavetype','pendingLeave','approvedLeave','rejectLeave','recentRequests'));
        
    }   
    
}
