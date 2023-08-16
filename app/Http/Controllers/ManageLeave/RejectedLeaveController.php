<?php

namespace App\Http\Controllers\ManageLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaverequest;

class RejectedLeaveController extends Controller
{
    public function reject(){
        $rejectLeave = Leaverequest:: where('status','rejected')->get();
        return view('/admin.rejected_leave',compact('rejectLeave'));
    }
    
    public function declineDelete($id){
        $rejectDelete = Leaverequest::findOrFail($id);
        $rejectDelete->delete();
        return redirect('/rejected_leave')->with('status','Data Has Been Deleted.');
    }
}
