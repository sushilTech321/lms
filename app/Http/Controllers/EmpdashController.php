<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leavetype;
use App\Models\User;
use App\Models\Leaverequest;

class EmpdashController extends Controller{

    public function empdash(){

    $unmarriedEmployees = User::where('maristatus', 'Married')->get();
        $leaveTypes = Leavetype::where(function ($query) {
            $query->where('leave_category', '<>', 'Maternity') // Exclude Maternity
                ->orWhere(function ($query) {
                    $query->where('leave_category', '<>', 'Paternity')      // Exclude Paternity
                        ->whereHas('user', function ($query) {
                        $query->where('maristatus', 'Married')      // Married employees only
                            ->whereIn('emp_gender', ['Female', 'Male']);    // Female or Male gender
                        });
                    });
        })->get();

        $users = auth()->user();

        // leave status
        $pendingLeave =  $users->Leaverequests()->where('status','pending')->count();
        $approvedLeave =  $users->Leaverequests()->where('status','approved')->count();
        $rejectLeave = $users->Leaverequests()->where('status','rejected')->count();

        return view('/home', compact('leaveTypes','pendingLeave','approvedLeave','rejectLeave'));
    }
}
