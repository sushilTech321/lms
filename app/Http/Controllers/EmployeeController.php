<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use DB;

class EmployeeController extends Controller
{
    public function index(){

        // $employees = Employee::all();

        $authId = Auth::id();
        $employees = DB:: table('employees') 
                    ->join('users','employees.id', '=', 'users.id')     //left join
                    -> select('employees.*','users.email')    
                    ->whereNotIn('users.id',[$authId])
                    ->get();   
        return view('/admin.addemployee',compact('employees'));
    }

    public function store(Request $request){
       
        $validatedData = $request->validate([
            'emp_name'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'emp_post'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'emp_maristatus'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'emp_gender'=> ['required', 'string', 'max:255','regex:/^[A-Za-z\s]+$/'],
            'emp_joinDate'=> ['required', 'date'],
            // 'emp_email' => ['required','email','unique:employees'],
            'usertype' => ['required','string'],
            // 'emp_passwd'=> ['required','string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
        ]);

        // password encryption
        $validatedData['emp_passwd'] = Hash::make($request->input('emp_passwd'));

        Employee::create($validatedData);

        return redirect('index')->with('status', 'Employee added successfully!');
    
    }
}
