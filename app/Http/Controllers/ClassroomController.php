<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ClassroomController extends Controller
{
    function show($id)
    {
        $result = Student::find($id);
        if ($result) {
            return response()->json(
                $result->classrooms
            );
        } else {
            return response()->json([
                "message" => "There's no such student in the database."
            ], 404);
        }
    }
}
