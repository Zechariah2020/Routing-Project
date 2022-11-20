<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Classroom;
use App\Models\Student;

class StudentApiController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }
    function show($id)
    {
        $result = Classroom::with("students")->find($id);
        if ($result) {
            return response()->json(
                StudentResource::collection($result->students)
            );
        } else {
            return response()->json([
                "message" => "There's no such classroom in the database."
            ], 404);
        }
    }
}
