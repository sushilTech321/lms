<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeEditController extends Controller
{
    public function empGet(Request $request,$id){
        $empEdit = User:: findOrFail($id);
        return view('/admin.edit_emp',compact('empEdit'));
    }

    public function empEdits(Request $request,$id){

        $empEdit = User::findOrFail($id);
        
        $empEdit->name = $request->input('name');
        $empEdit->emp_joinDate = $request->input('emp_joinDate');
        $empEdit->email = $request->input('email');
        $empEdit->post = $request->input('post');
        $empEdit->emp_gender = $request->input('emp_gender');
        $empEdit->maristatus = $request->input('maristatus');

        $empEdit->update();

        return redirect('/register')->with('status','Employee`s information has been updated.');
    }

}
