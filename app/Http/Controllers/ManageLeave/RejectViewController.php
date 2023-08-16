<?php

namespace App\Http\Controllers\ManageLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaverequest;

class RejectViewController extends Controller
{
    public function rejectView(Request $request,$id){
        $rejectView = Leaverequest::findOrFail($id);
        return view('/admin.reject_view',compact('rejectView'));
    }
}
