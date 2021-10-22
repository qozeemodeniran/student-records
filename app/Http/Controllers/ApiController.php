<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class ApiController extends Controller
{
    // Adding methods/logics to contron the api requests...

    // Function and logics to get all students
    public function getAllStudents(){
        // Using already imported Student model to make simple eloguent query to return all students from database.
        $student = Student::get()->toJson(JSON_PRETTY_PRINT);

        return response($student, 200);
    }

    // Function and logics to create new student
    public function createStudent(Request $request){
        // Using laravel request class to fetch data(name: string, course: string) passed to the endpoint...
        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json(["message" => "Student created successfully"], 201);
    }

    // Function and logics to get specific student record
    public function getStudent($id){
        if(Student::where('id', $id)->exists()){
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

            return response($student, 200);
        }else{
            return response()->json(["message" => "Student not found"], 404);
        }
    }

    // Function and logics to update specific student record
    public function updateStudent(Request $request, $id){
        // Check if student with specified id exists
        if(Student::where('id', $id)->exists()){
            // Fid students with reference id
            $student = Student::find($id);
            // update student name
            $student->name = is_null($request->name) ? $student->name : $request->name;
            // update student course
            $student->course = is_null($request->course) ? $student->course : $request->course;
            // save new record
            $student->save();

            return response()->json(["message" => "Record updated successfully"], 200);
        }else{
            return response()->json(["message" => "Student not foud"], 404);
        }
    }

    // Function and logics to delete specific student
    public function deleteStudent($id){
        if(Student::where('id', $id)->exists()){
            $student = Student::find($id);
            $student->delete();

            return response()->json(["message" => "Record deleted successfully"], 200);
        }else{
            return response()->json(["message" => "Record not found"], 404);
        }
    }
}
