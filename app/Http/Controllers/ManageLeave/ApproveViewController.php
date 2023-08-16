<?php

namespace App\Http\Controllers\ManageLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaverequest;

class ApproveViewController extends Controller
{
    public function view(Request $request,$id){

        $approveView = Leaverequest::findOrFail($id);
        
        return view('/admin.approve_view',compact('approveView',));
    }
}
