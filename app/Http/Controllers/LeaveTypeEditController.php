<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leavetype;

class LeaveTypeEditController extends Controller
{
    public function leavetypeEdit(Request $request,$leave_id){

        $leaveEdits = Leavetype::findOrFail($leave_id);

        return view('/admin.leavetype_edit',compact('leaveEdits'));
    }

    public function editUpdate(Request $request,$leave_id){

        $leaveEdits = Leavetype::findOrFail($leave_id);
        
        $leaveEdits->leave_type = $request->input('leave_type');
        $leaveEdits->leave_category = $request->input('leave_category');
        $leaveEdits->leave_tenure = $request->input('leave_tenure');
        $leaveEdits->leave_duration = $request->input('leave_duration');
        $leaveEdits->description = $request->input('description');

        $leaveEdits->update();

        return redirect('/leavetype')->with('status','Data has been updated.');
    }
}
