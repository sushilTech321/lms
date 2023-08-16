<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Leaverequest;

class AdminViewHistoryController extends Controller
{
    public function viewHistory(Request $request,$id){

        $history_view = Leaverequest::findOrFail($id);
        return view('/admin.view_history',compact('history_view'));
    }
}
