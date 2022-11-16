<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class StudentController extends Controller
{
    function show($id)
    {
        $result = Classroom::find($id);
        if ($result) {
            return response()->json(
                $result->students
            );
        } else {
            return response()->json([
                "message" => "There's no such classroom in the database."
            ], 404);
        }
    }
}
