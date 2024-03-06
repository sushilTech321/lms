<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leaverequest;

class AdminApproveController extends Controller
{
    public function approve(){
        
        $approvepend= Leaverequest::where('status','pending')->get();
        return view('/admin.admin_approve',compact('approvepend'));
    }
    
    public function delReqst($id){
        $delete = Leaverequest::findOrFail($id);
        $delete->delete();
        // return redirect('/admin_approve')->with('status','Leave Request Deleted Successfully.');
        return response()->json([
            'status' => 200, 
            'msg' => "Leave Request Deleted Successfully."
        ],200);
    }
}
