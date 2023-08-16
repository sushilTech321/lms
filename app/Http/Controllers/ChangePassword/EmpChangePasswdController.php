<?php

namespace App\Http\Controllers\ChangePassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmpChangePasswdController extends Controller{

    public function changePasswd(Request $request){
        return view('/employee.change_password');
    }

    public function updatePasswd(Request $request){

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

        return redirect('change_passwords')->with('status','Password Changed Successfully');
    }
}
