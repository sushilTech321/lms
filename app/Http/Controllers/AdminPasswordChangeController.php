<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminPasswordChangeController extends Controller
{
    public function adminPasswd(){
        return view('admin.admin_passwd_change');
    }

    public function adminChangePasswd(Request $request){

        $users = Auth::user();

        $request->validate([
            'current_password' => ['required','string'],
            'new_password' => ['required','string','min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'password' => ['required','string','min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/', 'same:new_password'],
        ]);

        if (!Hash::check($request->current_password, $users->password)) {
            return redirect('change_passwords')->withErrors(['current_password' => 'Incorrect current password']);
        }

        $users->password = bcrypt($request->input('password'));

        $users->update();

        return redirect('admin.admin_passwd_change')->with('status','Password Changed Successfully');
    }
}
