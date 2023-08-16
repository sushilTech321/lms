<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leavetype;

class LeaveController extends Controller
{
    public function leavetype()
    {
        $leavetype = Leavetype ::all(); 
        return view('admin.leavetype', compact('leavetype') );
    }

    public function leavestore(Request $request)
    {
        $validatedData = $request->validate([
            'leave_type' => ['required','string'],
            'leave_category' => ['required','string'],
            'leave_tenure' => ['required','string','unique:leavetypes'],
            'leave_duration' => ['required','integer','unique:leavetypes'],
            'description' => ['required','string'],
        ]);

        Leavetype ::create($validatedData);

        return redirect('/leavetype')->with('status', 'Leave type added successfully!');
    }


}
