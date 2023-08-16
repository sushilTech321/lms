<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmpemailpassController extends Controller
{
    public function empemail(){
        return view('/admin.emp_emailpasswd');
    }

    public function empemailpass(Request $request){
        
        $validatedData = $request->validate([
            'name'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'email' => ['required','email','unique:users'],
            'password'=> ['required','string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],

        ]);

        User::create($validatedData);
        
        return redirect('empemail')->with('status', 'Email and Password Added Successfully!');
    }
}
