<?php

namespace App\Http\Controllers\ManageLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaverequest;

class ApprovedContoller extends Controller
{
    public function approvedLeave(){
        $approvedLeave = Leaverequest::where('status','approved')->get();
        return view('/admin.approved_leave',compact('approvedLeave'));
    }
    
    public function apvleaveDelete($id){
        $approvedDelete = Leaverequest::findOrFail($id);
        $approvedDelete->delete();
        return redirect('/approved_leave')->with('status','Approved Leave Has Been Deleted.');
    }
}
