<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function apiTest(){

        // $students = Student :: where('name','')->get();

        $students = Student :: all();

        if ($students->count() > 0) {

            return response()->json([
                'status'=> 200,
                'function' => 'apiTest',
                'msg' => "success",
                'message' => $students
            ],200);

        } else {
            return response()->json([
                'status'=> 404,
                'message' => 'No record found'
            ],404);
        }   
    }

    public function create(Request $request){
        // Validate the request data
        $validator = $request->validate([
            'name' => 'required|string|max:191',
            'course' => 'required|string',
            'email' => 'required|email|unique:students',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()  
            ],422);
        } else {

            // Insert data into the 'students' table
            $student = Student::create([
            'name' => $request->name,
            'course' => $request->course,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        
        if ($student) {

        // Return a response

        return response()->json([
            'status' => 200,
            'message' => 'Student created successfully',
            // 'data' => $student,
        ], 200);

        } else {

            return response()->json([
                'status' => 500,
                'message' => 'Internal Server error',
            ], 200);
        }
        
        }
    }
}
