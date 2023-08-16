<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Leaverequest;

class AdminLeaveHistoryController extends Controller
{
    public function history(){
        $history = Leaverequest::all();
        return view('/admin.leave_history',compact('history'));
    }

    public function historyDelete($id){
        $history = Leaverequest::findOrFail($id);
        $history->delete();
        return redirect('/Adminleave_history')->with('status','Leave history has been deleted.');
    }
}
