<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'course' => 'required',
            'phone' => 'required'
        ]);

        $student = new Student();
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->course = $request->get('course');
        $student->phone = $request->get('phone');
        $result = $student->save();
        if ($result) {
            return response()->json([
                'status' => 'true',
                'message' => 'Data saved successfully...'
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Error in saving the data...'
            ], 500);
        }
    }

    public function show()
    {
        $student = Student::all();
        if ($student) {
            return response()->json([
                'status' => 'true',
                'message' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'student' => 'Data not found'
            ], 500);
        }
    }

    public function delete($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return response()->json([
                'status' => 'true',
                'student' => 'Data deleted successfully...'
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'student' => 'Error in deleting the data...'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'course' => 'required',
            'phone' => 'required'
        ]);

        $student = Student::find($id);
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->course = $request->get('course');
        $student->phone = $request->get('phone');
        $result = $student->save();
        if ($result) {
            return response()->json([
                'status' => 'true',
                'student' => 'Data updated successfully...'
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'student' => 'Error in updating the data...'
            ], 500);
        }
    }
}