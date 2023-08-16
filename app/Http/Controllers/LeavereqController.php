<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave_request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class LeavereqController extends Controller
{
    public function reqshow(){

        $loggedInUserId = Auth::id();
        $employeeData = User::where('id', $loggedInUserId)->first();
        return view('/employee.leaveform',compact('employeeData'));
    }

    // Eloquent ORM method
    // public function reqData(Request $request){
    //     $validatedData = $request->validate([
    //        'ltype_req' => ['required'],
    //        'lcat_req' => ['required'],
    //        'attachments' => ['required'],
    //        'startdate' =>  ['required'],
    //        'enddate' =>  ['required'],
    //     //    'leave_days'  =>  ['required','integer'],
    //     ]);
    //     LeaveRequest::create($validatedData );
    //     return redirect('reqshow')->with('status','request send');
    // }

    //Query Builder method
    public function reqData(Request $request){        

        $data = array(
          'name_req' =>$request->name_req,
          'post' =>$request->post,
          'email' =>$request->email,
          'maristatus' =>$request->maristatus,
          'gender' =>$request->gender,
          'joindate' =>$request->joindate,
          'ltype_req' => $request-> ltype_req,
          'lcat_req'  => $request->lcat_req,
          'attachments' => $request-> attachments,
          'startdate' => $request-> startdate,
          'enddate' =>  $request->enddate,
          'leave_days'  => $request->leave_days,
          'applied_on'  => $request->applied_on,
          'status' => 'pending',
          'admin_remarks' => 'Admin remarks here',
          'user_id' => $request->user_id,
        );
        $insert = DB::table('leaverequests')->insert($data);
        return redirect('leaveform')->with('status','Request Submitted Successfully.');

      }
}
