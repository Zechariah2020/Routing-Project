<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClassroomResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\Classroom;
use App\Search\SearchClass;


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


    function showViaClassroomModel($id)
    {
        $result = Classroom::with('students')->get();
        // $result = Student::with('classrooms')->where('id', '=', $id)->get();
        return response()->json(
            [
                $result
            ]
        );
    }


    public function getById($id)
    {
        return response()->json([
            (new SearchClass())->getById($id)
        ]);
    }
}
