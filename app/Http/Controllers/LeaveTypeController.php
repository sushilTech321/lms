<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leavetype;

class LeaveTypeController extends Controller
{
    public function leaveDel($leave_id){

        $delete = Leavetype::findOrFail($leave_id);
        $delete->delete();
        return redirect('/leavetype')->with('status','Leave Type Deleted Successfully.');
    }
}
