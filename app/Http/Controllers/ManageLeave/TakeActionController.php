<?php

namespace App\Http\Controllers\ManageLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaverequest;

class TakeActionController extends Controller
{
    public function takeAction(Request $request,$id){   
        /**
         * Retrieving leaverequests table's data in admin dashboard using id
         */
        $action = Leaverequest::findOrFail($id);
        return view('admin.takeaction', compact('action'));
    }
    
    public function statusUpdate(Request $request,$id){
        
        $action = Leaverequest::findOrFail($id);
        
        $action->status = $request->input('status');
        if ($request->has('admin_remarks')) {
            $action->admin_remarks = $request->input('admin_remarks');
        }

        $action->update();

        return redirect('/admin_approve')->with('status','Leave request has been updated.');
    }
    
}
