<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function index(){

        $users = User::all()->except(Auth::id());
        return view('/admin.addemployee',compact('users'));
    }

    public function store(Request $request){
       
        $validatedData = $request->validate([
            'name'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'post'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'maristatus'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'emp_gender'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'usertype' => ['required','string'],
            'emp_joinDate'=> ['required', 'date'],
            'email' => ['required','email','unique:users'],
            'password'=> ['required','string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
        ]);

        // password encryption
        $validatedData['password'] = Hash::make($request->input('password'));

        User::create($validatedData);

        return redirect('register')->with('status', 'Employee added successfully!');
    }

    public function delete($id){
        $delete = User:: findOrFail($id);
        $delete->delete();
        // return redirect('/register')->with('status','Employee deleted successfully.');
        return response()->json([
            'status' => 200,
            'msg' => "Employee deleted successfully!",
        ],200);
    }   
}
